<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class WorkController extends Controller
{
    public function Index(){
        $works = Work::get()->toArray();
        return view('backend.pages.work.index')->with(compact("works"));
    }
    public function Delete($id){
        $data= Work::find($id);

        if(Storage::disk('public')->exists('images/work'))
        {
           Storage::delete('images/work/'.$data['thumbnail']);
        }
        $data->delete();
        toast('Deleted successfully', 'success');
        return redirect()->back();
     }
     public function Edit(Request $request, $id){
         $workInfo = Work::find($id)->toArray();

         if($request->isMethod('post')){

             $data= $request->all();
             if($request->hasFile('thumbnail'))
             {
              $image=$request->file('thumbnail');

              if(Storage::disk('public')->exists('images/work'))
              {
              Storage::delete('images/work/'.$workInfo['thumbnail']);
              }
              $currentDate=Carbon::now()->toDateString();
              $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

              if(!Storage::disk('public')->exists('images/work'))
              {
                 Storage::disk('public')->makeDirectory('images/work');
              }
              $workImage = Image::make($image)->resize(800,900)->stream();
              Storage::disk('public')->put('images/work/'.$imageName,$workImage);

             }else{
                 $imageName = $workInfo['thumbnail'];
             }

             Work::where('id',$id)->update(['title'=>$data['title'],'heading1'=>$data['heading1'],'heading2'=>$data['heading2'], 'details1'=>$data['details1'], 'details2'=>$data['details2'],'thumbnail'=>$imageName, 'link'=>$data['link']]);
             toast('Updated successfully!', 'success');
             return redirect('admin/work/index');
         }
         return view("backend.pages.work.edit")->with(compact('workInfo'));
      }
      public function Add(Request $request){
          if($request->isMethod('post')){


             $data=$request->all();

             $this->validate($request,[
                 'title'=>'required|',
                 'heading1'=>'required|',
                 'heading2'=>'required|',
                 'details1'=>'required|',
                 'details2'=>'required|',
                 'link'    =>'required|',
                 'thumbnail'=>'required|image'
             ]);

             if($request->hasFile('thumbnail'))

             {
              $image=$request->file('thumbnail');
              $currentDate=Carbon::now()->toDateString();
              $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

              if(!Storage::disk('public')->exists('images/work'))
              {
                 Storage::disk('public')->makeDirectory('images/work');
              }

              $workImage = Image::make($image)->resize(800,900)->stream();
              Storage::disk('public')->put('images/work/'.$imageName,$workImage);
             }else{
                 $imageName= 'default.png';
             }
              $work= New Work;
              $work->title= $data['title'];
              $work->heading1= $data['heading1'];
              $work->heading2 =$data['heading2'];
              $work->details1= $data['details1'];
              $work->details2= $data['details2'];
              $work->link= $data['link'];
              $work->thumbnail= $imageName;

              $work->status= 1;
              $work->save();
              toast('Information uploaded successfully!', 'success');
              return redirect('admin/work/index');
          }
           return view('backend.pages.work.add');
      }

     //  Update status
     public function updateWorkStatus(Request $request){
         if($request->ajax()){
             if($request->ajax()){
                 $data= $request->all();
                 if($data['status']=='Active'){
                     $status=0;
                 }else{
                     $status=1;
                 }
                 Work::where('id',$data['work_id'])->update(['status'=>$status]);
                 return response()->json(['status'=>$status, 'id'=>$data['work_id']]);
             }
         }

     }
}
