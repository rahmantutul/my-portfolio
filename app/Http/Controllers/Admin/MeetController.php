<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MeetController extends Controller
{
    public function Index(){
        $meets=Meet::all();
        return view('backend.pages.meet.index')->with(compact('meets'));
    }
    public function Delete($id){
       Meet::find($id)->delete();
       toast('Meet section deleted successfully', 'success');
       return redirect()->back();
    }
    public function Edit(Request $request, $id){
        $meetInfo = Meet::find($id)->toArray();
        if($request->isMethod('post')){

            $data= $request->all();
            if($request->hasFile('image'))
            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/meet'))
             {
                Storage::disk('public')->makeDirectory('images/meet');
             }
             if(Storage::disk('public')->exists('images/meet'))
             {
                 Storage::delete('images/meet/'.$meetInfo['image']);
             }
             $meetImage = Image::make($image)->resize(700,900)->stream();
             Storage::disk('public')->put('images/meet/'.$imageName,$meetImage);
            }else{
                $imageName = $meetInfo['image'];
            }
            Meet::where('id',$id)->update(['heading1'=>$data['heading1'],'heading2'=>$data['heading2'], 'details1'=>$data['details1'], 'details2'=>$data['details2'],'image'=>$imageName]);
            toast('Information updated successfully!', 'success');
            return redirect('admin/meet/index');
        }
        return view("backend.pages.meet.edit")->with(compact('meetInfo'));
     }
     public function Add(Request $request){
         if($request->isMethod('post')){


            $data=$request->all();

            $this->validate($request,[
                'heading1'=>'required|',
                'heading2'=>'required|',
                'details1'=>'required|',
                'details2'=>'required|',
                'image'   =>'required'
            ]);

            if($request->hasFile('image'))

            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/meet'))
             {
                Storage::disk('public')->makeDirectory('images/meet');
             }

             $profileImage = Image::make($image)->resize(700,900)->stream();
             Storage::disk('public')->put('images/meet/'.$imageName,$profileImage);
            }else{
                $imageName= 'default.png';
            }
             $meet= New Meet;

             $meet->heading1= $data['heading1'];
             $meet->heading2 =$data['heading2'];
             $meet->details1= $data['details1'];
             $meet->details2= $data['details2'];
             $meet->image= $imageName;

             $meet->status= 1;
             $meet->save();
             toast('Information uploaded successfully!', 'success');
             return redirect('admin/meet/index');
         }
          return view('backend.pages.meet.add');
     }

    //  Update status
    public function updateMeetStatus(Request $request){
        if($request->ajax()){
            if($request->ajax()){
                $data= $request->all();
                if($data['status']=='Active'){
                    $status=0;
                }else{
                    $status=1;
                }
                Meet::where('id',$data['meet_id'])->update(['status'=>$status]);
                return response()->json(['status'=>$status, 'id'=>$data['meet_id']]);
            }
        }

    }
}
