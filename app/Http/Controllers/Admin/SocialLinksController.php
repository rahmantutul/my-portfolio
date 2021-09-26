<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    public function Index(){
        $links = SocialLink::latest()->get()->toArray();
        return view('backend.pages.social.index')->with(compact('links'));
    }
    public function updateLinkStatus(Request $request){
            if($request->ajax()){
            $data= $request->all();
            // print($data['link_id']);
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            SocialLink::where('id',$data['link_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['link_id']]);
        }
    }
    public function Delete($id){
         SocialLink::find($id)->delete();
        return redirect()->back();
    }

    public function Edit(Request $request, $id){
       $linkInfo = SocialLink::find($id)->first()->toArray();
       if($request->isMethod('post')){
           $data= $request->all();
           SocialLink::where('id',$id)->update(['facebook'=>$data['facebook'],'instagram'=>$data['instagram'], 'tweeter'=>$data['tweeter'], 'vimeo'=>$data['vimeo'], 'googleMap'=>$data['googleMap'], 'linkedIn'=>$data['linkedIn']]);
           toast('Information updated successfully!', 'success');
           return redirect()->back();
       }
       return view("backend.pages.social.edit")->with(compact('linkInfo'));
    }
    public function Add(Request $request){
        if($request->isMethod('post')){
           $data= $request->all();
           $request->validate([
             'facebook'=>'required',
             'instagram'=>'required',
             'vimeo'=>'required',
             'linkedIn'=>'required',
             'googleMap'=>'required',
             'tweeter'=>'required',
           ]);
           $link = new SocialLink;
           $link->facebook=$data['facebook'];
           $link->instagram=$data['instagram'];
           $link->vimeo=$data['vimeo'];
           $link->linkedIn=$data['linkedIn'];
           $link->googleMap=$data['googleMap'];
           $link->tweeter=$data['tweeter'];
           $link->status=1;
           $link->save();
           toast('Information saved successfully!', 'success');
           return redirect('admin/social/index');
        };
        return view('backend.pages.social.add');
    }
}
