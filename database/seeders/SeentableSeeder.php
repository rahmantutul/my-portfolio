<?php

namespace Database\Seeders;

use App\Models\Seen;
use Illuminate\Database\Seeder;

class SeentableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seenData=[
            ['id'=>1,'image'=>'default.png','details'=>'HELLO! Lorem ipsum dolor, sit amet consectetur  ','status'=>1],
            ['id'=>2,'image'=>'default.png','details'=>'HELLO! Lorem ipsum dolor, sit amet consectetur  ','status'=>1],
        ];
        Seen::insert($seenData);
    }
}
