<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('verifications')->insert([
            [
                'title' => 'PRAL VERIFY Last 2 years '
            ],
            [
                'title' => 'CUSTOM FILE NO'
            ],
            [
                'title' => 'FILE OPEN'
            ],
            [
                'title' => 'BANK EMAIL'
            ],
            [
                'title' => 'BANK NAME'
            ],
            [
                'title' => 'BANK REPLY'
            ],
            [
                'title' => 'PRC AMOUNT'
            ],
            [
                'title' => 'FILE APPROVED'
            ],
            [
                'title' => 'FILE MOVE COLLECTORATE'
            ],
            [
                'title' => 'RE APPROVE AFTER FILE MOVE'
            ],
            [
                'title' => 'EXPORT CERTIFICATE OUT FOR CLEARANCE'
            ],
            [
                'title' => 'EXPORT CERTIFICATE RETURN OFFICE'
            ],
            [
                'title' => 'ORIGNAL PASSPORT OUT'
            ],
            [
                'title' => 'ORIGNAL PASSPORT RETURN OFFICE'
            ],
            [
                'title' => 'PASSPORT SEEN DATE BEFOR DUTY PAID'
            ],
            [
                'title' => 'BL CHANGE BEFORE VESSEL BIRTH'
            ],
            [
                'title' => 'AMENDMENT  FROM CUSTOMS'
            ],
        ]);
    }
}
