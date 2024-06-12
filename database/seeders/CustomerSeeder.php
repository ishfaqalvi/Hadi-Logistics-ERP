<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            [
                'name' => 'Ahmad',
                'father_name' => 'M ALi',
                'email' => 'ahmad@gmail.com',
                'phone_number' => '03020977889',
                'cnic' => '33100-9998743-1',
                'address' => 'Faisalabad, Pakistan',
            ]
        ]);
    }
}
