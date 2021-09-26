<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CategoryRecord=[
            ['id'=>1 , 'facebook'=> 'https://www.facebook.com/', 'instagram'=>'https://www.facebook.com/' , 'vimeo'=>'https://www.facebook.com/','linkedin'=>'https://www.facebook.com/','tweeter'=>'https://www.facebook.com/','googleMap'=>'https://www.facebook.com/', 'status'=>1],
            ['id'=>2 , 'facebook'=> 'https://www.facebook.com/', 'instagram'=>'https://www.facebook.com/' , 'vimeo'=>'https://www.facebook.com/','linkedin'=>'https://www.facebook.com/','tweeter'=>'https://www.facebook.com/','googleMap'=>'https://www.facebook.com/', 'status'=>1],
         ];
         SocialLink::insert($CategoryRecord);
    }
}
