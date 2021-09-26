<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function login(Request $request){

        if($request->isMethod('Post')){
            $data= $request->all();
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
                toast('Login Successfully!','success');
                return redirect('/admin/dashboard');

            }else{
                toast('Invalid username and Password!','warning');
                return redirect()->back();
            }
        }

       return view('backend.pages.login');
    }
    public function Index(){
        return view('backend.pages.index');
    }

    // Logout

    public function Logout(){
        Auth::guard('admin')->logout();
        toast('Logout Successfully!','success');
        return redirect('/admin');
    }

    public function Settings(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();

            $this->validate($request,[
                'name'=>'required|',
                'mobile'=>'required|numeric',
                'email'=>'required|email',
                'image'=> 'image',
            ]);


            if($request->hasFile('image'))
            {

             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/admin/profile'))
             {
                Storage::disk('public')->makeDirectory('images/admin/profile');
             }

             $profileImage = Image::make($image)->resize(400,400)->stream();
             Storage::disk('public')->put('images/admin/profile/'.$imageName,$profileImage);
             Admin::where('email',Auth::guard('admin')->user()->email)->update(['image'=> $imageName]);
            }else{
                $imageName= Auth::guard('admin')->user()->image;
            }


            Admin::where('email',Auth::guard('admin')->user()->email)->update(['email'=>$data['email'],'name'=>$data['name'],'mobile'=>$data['mobile']]);
             toast('Information updated successfully!','success');
             return back();
          }

       return view('backend.pages.settings');
    }

    public function CheckPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['Old'] , Auth::guard('admin')->user()->password)){
          echo "true";
        }else{
           echo "false";
        }
    }
    public function ChangePassword(Request $request){
        $request->validate([
            'Old'=>'required',
            'New'=>'required',
            'Confirm'=>'required'
        ]);
        $data= $request->all();
         if(Hash::check($data['Old'], Auth::guard('admin')->user()->password)){
                if($data['New']==$data['Confirm']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['New'])]);
                    toast('Passwords changed successfully!','success');
                    Auth::guard('admin')->logout();
                    return redirect('/admin');
                }
         }else{
            toast('Passwords is not valid!','warning');
            return back();
         }
     }
}
