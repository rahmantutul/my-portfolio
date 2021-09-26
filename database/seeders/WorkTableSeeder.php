<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Seeder;

class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $WorkData=[
            ['title'=>'Left', 'heading1'=>'First', 'heading2'=>'Second','details1'=>' HELLO! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut magnam ullam culpa aliquid id sapiente libero temporibus! Optio beatae animi iste nam iusto vel, suscipit amet voluptatum nemo, facilis omnis.', 'details2'=>' HELLO! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut magnam ullam culpa aliquid id sapiente libero temporibus! Optio beatae animi iste nam iusto vel, suscipit amet voluptatum nemo, facilis omnis.', 'thumbnail'=>'default.png', 'link'=>'http://youtube.com','status'=>1],
        ];
        Work::insert($WorkData);
    }
}
