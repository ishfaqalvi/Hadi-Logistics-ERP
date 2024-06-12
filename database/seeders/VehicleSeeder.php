<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vehicle_companies')->insert([
            [
                'title' => 'Honda'
            ]
        ]);
        DB::table('vehicles')->insert([
            [
                'vehicle_company_id' => 1,
                'title' => 'Prius'
            ]
        ]);
    }
}
