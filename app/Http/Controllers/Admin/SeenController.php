<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SeenController extends Controller
{
    public function Index(){
        $seens=seen::all();
        return view('backend.pages.seen.index')->with(compact('seens'));
    }
    public function Delete($id){
       seen::find($id)->delete();
       toast('Deleted successfully', 'success');
       return redirect()->back();
    }
    public function Edit(Request $request, $id){
        $seenInfo = seen::find($id)->toArray();
        if($request->isMethod('post')){

            $data= $request->all();
            if($request->hasFile('image'))
            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/seen'))
             {
                Storage::disk('public')->makeDirectory('images/seen');
             }
            if(Storage::disk('public')->exists('images/seen'))
            {
                Storage::delete('images/seen/'.$seenInfo['image']);
            }
             $seenImage = Image::make($image)->resize(800,1000)->stream();
             Storage::disk('public')->put('images/seen/'.$imageName,$seenImage);
            }else{
                $imageName = $seenInfo['image'];
            }
            seen::where('id',$id)->update([ 'details'=>$data['details'],'image'=>$imageName]);
            toast('Information updated successfully!', 'success');
            return redirect('admin/seen/index');
        }
        return view("backend.pages.seen.edit")->with(compact('seenInfo'));
     }
     public function Add(Request $request){
         if($request->isMethod('post')){
            $data=$request->all();

            $this->validate($request,[
                'details'=>'required|',
                'image'   =>'required'
            ]);

            if($request->hasFile('image'))

            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/seen'))
             {
                Storage::disk('public')->makeDirectory('images/seen');
             }

             $profileImage = Image::make($image)->resize(800,1000)->stream();
             Storage::disk('public')->put('images/seen/'.$imageName,$profileImage);
            }else{
                $imageName= 'default.png';
            }
             $seen= New seen;

             $seen->details= $data['details'];
             $seen->image= $imageName;

             $seen->status= 1;
             $seen->save();
             toast('Uploaded successfully!', 'success');
             return redirect('admin/seen/index');
         }
          return view('backend.pages.seen.add');
     }

    //  Update status
    public function updateSeenStatus(Request $request){
        if($request->ajax()){
            if($request->ajax()){
                $data= $request->all();
                if($data['status']=='Active'){
                    $status=0;
                }else{
                    $status=1;
                }
                seen::where('id',$data['seen_id'])->update(['status'=>$status]);
                return response()->json(['status'=>$status, 'id'=>$data['seen_id']]);
            }
        }

    }
}
