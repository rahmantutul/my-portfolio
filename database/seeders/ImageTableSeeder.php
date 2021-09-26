<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ImageData=[
           ['id'=>1, 'header_logo'=>'default.png','video'=>'default.mp4','parallax'=>'default.png','footer_logo'=>'default.png','status'=>1],
           [ 'id'=>2,'header_logo'=>'default.png','video'=>'default.mp4','parallax'=>'default.png','footer_logo'=>'default.png','status'=>1],
        ];
          Images::insert($ImageData);
    }
}
