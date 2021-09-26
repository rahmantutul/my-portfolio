<?php

namespace Database\Seeders;

use App\Models\Meet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meetRecord= [
           [ 'id'=>1, 'heading1'=>'Heading1','heading2'=>'Heading2','details1'=>'Details1','details2'=>'Details2','image'=>'default.png','status'=>1],
        ];
        Meet::insert($meetRecord);

    }
}
