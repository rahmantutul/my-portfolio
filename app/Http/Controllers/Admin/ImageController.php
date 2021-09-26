<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Images;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function Index(){
        $logos=Images::all();
        return view('backend.pages.Image.index')->with(compact('logos'));
    }
    public function Delete($id){
        Images::findOrFail($id)->delete();
        toast('Deleted successfully!', 'success');
        return redirect()->back();
    }
    public function Edit(Request $request, $id){
        $logoInfo= Images::findOrFail($id);
         if($request->isMethod("POST")){
             $request->validate([
               ' video'=>'mimes:mp4,mov,ogg',
             ]);
             $info = $request->all();
             if($request->hasFile('header_logo'))
             {
              $image=$request->file('header_logo');
              $currentDate=Carbon::now()->toDateString();
              $headerLogo=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

              if(!Storage::disk('public')->exists('images/logo'))
              {
                 Storage::disk('public')->makeDirectory('images/logo');
              }
                if(Storage::disk('public')->exists('images/logo'))
                {
                    Storage::delete('images/logo/'.$logoInfo['header_logo']);
                }
              $headerImage = Image::make($image)->resize(500,700)->stream();
              Storage::disk('public')->put('images/logo/'.$headerLogo,$headerImage);
             }else{
                 $headerLogo = $logoInfo['header_logo'];
             }


             if($request->hasFile('footer_logo'))
             {
              $image=$request->file('footer_logo');
              $currentDate=Carbon::now()->toDateString();
              $footerLogo=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

              if(!Storage::disk('public')->exists('images/logo'))
              {
                 Storage::disk('public')->makeDirectory('images/logo');
              }
              if(Storage::disk('public')->exists('images/logo'))
                {
                    Storage::delete('images/logo/'.$logoInfo['footer_logo']);
                }
              $footerImage = Image::make($image)->resize(800,1000)->stream();
              Storage::disk('public')->put('images/logo/'.$footerLogo,$footerImage);
             }else{
                 $footerLogo = $logoInfo['footer_logo'];
             }


             if($request->hasFile('parallax'))
             {
              $image=$request->file('parallax');
              $currentDate=Carbon::now()->toDateString();
              $parallaxImageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

              if(!Storage::disk('public')->exists('images/logo'))
              {
                 Storage::disk('public')->makeDirectory('images/logo');
              }
              if(Storage::disk('public')->exists('images/logo'))
              {
                  Storage::delete('images/logo/'.$logoInfo['parallax']);
              }
              $parallaxImage = Image::make($image)->resize(1000,1800)->stream();
              Storage::disk('public')->put('images/logo/'.$parallaxImageName,$parallaxImage);
             }else{
                 $parallaxImageName = $logoInfo['footer_logo'];
             }

             if($request->hasFile('video')){
                $extension = $request->file('video')->getClientOriginalExtension();
                $fileNameToStore ='_'.time().'.'.$extension;
                $path = $request->file('video')->storeAs('public/videos/',$fileNameToStore);
                if(Storage::disk('public')->exists('videos/'))
                {
                    Storage::delete('videos/'.$logoInfo['video']);
                }

            }else{
                $fileNameToStore = $logoInfo['video'];
            }

            Images::where('id',$id)->update(['header_logo'=>$headerLogo, 'video'=>$fileNameToStore, 'parallax'=>$parallaxImageName, 'footer_logo'=>$footerLogo]);
            toast('Updated successfully!', 'success');
            return redirect()->back();


         }

        return view('backend.pages.Image.edit')->with(compact('logoInfo'));
    }
    public function Add(Request $request){
        if($request->isMethod('POST')){
            $request->validate([
                ' video'=>'mimes:mp4,mov,ogg',
              ]);
              $info = $request->all();
              if($request->hasFile('header_logo'))
              {
               $image=$request->file('header_logo');
               $currentDate=Carbon::now()->toDateString();
               $headerLogo=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

               if(!Storage::disk('public')->exists('images/logo'))
               {
                  Storage::disk('public')->makeDirectory('images/logo');
               }
               $headerImage = Image::make($image)->resize(500,700)->stream();
               Storage::disk('public')->put('images/logo/'.$headerLogo,$headerImage);
              }else{
                  $headerLogo = 'default.png';
              }


              if($request->hasFile('footer_logo'))
              {
               $image=$request->file('footer_logo');
               $currentDate=Carbon::now()->toDateString();
               $footerLogo=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

               if(!Storage::disk('public')->exists('images/logo'))
               {
                  Storage::disk('public')->makeDirectory('images/logo');
               }
               $footerImage = Image::make($image)->resize(800,1000)->stream();
               Storage::disk('public')->put('images/logo/'.$footerLogo,$footerImage);
              }else{
                  $footerLogo =  'default.png';
              }


              if($request->hasFile('parallax'))
              {
               $image=$request->file('parallax');
               $currentDate=Carbon::now()->toDateString();
               $parallaxImageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

               if(!Storage::disk('public')->exists('images/logo'))
               {
                  Storage::disk('public')->makeDirectory('images/logo');
               }
               $parallaxImage = Image::make($image)->resize(1000,1800)->stream();
               Storage::disk('public')->put('images/logo/'.$parallaxImageName,$parallaxImage);
              }else{
                  $parallaxImageName =  'default.png';
              }

              if($request->hasFile('video')){
                 $extension = $request->file('video')->getClientOriginalExtension();
                 $fileNameToStore ='_'.time().'.'.$extension;
                 $path = $request->file('video')->storeAs('public/videos/',$fileNameToStore);
             }else{
                 $fileNameToStore =  'default.mp4';
             }
             $imageRequest = New Images;
             $imageRequest->header_logo= $headerLogo;
             $imageRequest->footer_logo= $footerLogo;
             $imageRequest->parallax= $parallaxImageName;
             $imageRequest->video= $fileNameToStore;
             $imageRequest->status= 1;
             $imageRequest->save();
             toast('Uploaded successfully!', 'success');
            return redirect('admin/image/index');
        };
        return view('backend.pages.Image.add');
    }
    public function updateLogoStatus(Request $request){
        if($request->ajax()){
            if($request->ajax()){
                $data= $request->all();
                if($data['status']=='Active'){
                    $status=0;
                }else{
                    $status=1;
                }
                Images::where('id',$data['logo_id'])->update(['status'=>$status]);
                return response()->json(['status'=>$status, 'id'=>$data['logo_id']]);
            }
        }
    }

}
