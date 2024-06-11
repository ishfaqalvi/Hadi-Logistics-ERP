<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassportCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('passport_checks')->insert([

            [
                'title' => 'DAYS TR SHEET IN FILE BAGGAGE 180 / TR 700 IN LAST 3 YEAR'
            ],
            [
                'title' => 'PASSPORT  VALIDITY 6 MONTH'
            ],
            [
                'title' => 'VISA OR AHQAMA VALIDITY 6 MONTH'
            ],
            [
                'title' => 'CNIC VALIDITY 6 MONTH OF CONSIGHNEE '
            ],
            [
                'title' => 'CNIC VALIDITY 6 MONTH  OF NOTIFY'
            ],
            [
                'title' => 'OLD PASSPORT REQUIRED  OR NOT'
            ],
            [
                'title' => 'CHECK BL CONSIGHNEE SPELING AS PR PASSPORT'
            ],
            [
                'title' => 'CHECK ENTER & EXIT STAMPS ORIGNAL OR FAKE'
            ],
            [
                'title' => 'CHECK  IN BL COLUM SAME AS CONSIGHNEE SECOND COLUM'
            ],
            [
                'title' => 'FRC SPELING CHECK AS PR CNIC & PASSPORT'
            ],
            [
                'title' => 'FATHER NAME SPELING CHECK FATHER CNIC & SON CNIC & FRC'
            ],
            [
                'title' => 'PRC CHECK TAHWEEL AL RAJHI + MONEY EXCHANGE & OTHER ISSUE'
            ],
            [
                'title' => 'CHECK DUTY AS PR PRC EXCHANGE RATE'
            ],
            [
                'title' => 'PASSPORT ISSUANCE DATE MINIMUM 2 YEARS FROM CURRENT DATE'
            ],
            [
                'title' => 'BANK STATEMNT TELLY AS PR TRANSACTION'
            ],
            [
                'title' => '(gift case)Attestation all pages of passport old & new cnic of passport person'
            ],
            [
                'title' => 'OTHER ISSUE BLANK COLUM MANUAL ENTER REMARKS'
            ]

        ]);
    }
}
