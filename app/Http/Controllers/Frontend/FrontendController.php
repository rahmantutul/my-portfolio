<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Meet;
use App\Models\Seen;
use App\Models\SocialLink;
use App\Models\Work;

class FrontendController extends Controller
{
    public function Index(){
        $works=Work::where('status',1)->get();
        $seen= Seen::where('status',1)->latest()->first();
        $meet = Meet::where('status',1)->latest()->first();
        // dd($meet);
        $link  =  SocialLink::where('status',1)->latest()->first();
        $image = Images::where('status',1)->latest()->first();

        // dd($works);
       return view('frontend.pages.index')->with(compact('works','meet','seen','link','image'));
     }

     public function getWorkDetails($id){
           return Work::findOrFail($id);
     }
}
