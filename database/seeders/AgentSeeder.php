<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('agents')->insert([
            [
                'name' => 'Amir',
                'email' => 'amir@gmail.com',
                'phone_number' => '03020977889',
                'address' => 'Faisalabad, Pakistan',
            ]
        ]);
    }
}
