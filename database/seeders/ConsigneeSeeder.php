<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsigneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('consignees')->insert([
            [
                'name' => 'Faizan',
                'father_name' => 'M ALi',
                'email' => 'faizan@gmail.com',
                'phone_number' => '03020977889',
                'cnic' => '33100-9998743-1',
                'passport' => '4567897345256',
                'address' => 'Faisalabad, Pakistan',
            ]
        ]);
    }
}
