<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('documents')->insert([
            [
                'title' => 'PASSPORT ORIGNAL OLD / GIFT SET',
                'type' => 'image'
            ],
            [
                'title' => 'PASSPORT ORIGNAL NEW / GIFT SET',
                'type' => 'image'
            ],
            [
                'title' => 'ORIGNAL PRC WITH SIGHN STAMP FROM BANK',
                'type' => 'image'
            ],
            [
                'title' => 'GIFT CASEPASSPORT PDF OLD & NEW PASSPORT',
                'type' => 'pdf'
            ],
            [
                'title' => 'AHQAMA / VISA  (PDF)',
                'type' => 'pdf'
            ],
            [
                'title' => 'CNIC COPY OF CONSIGHNEE  (PDF)',
                'type' => 'pdf'
            ],
            [
                'title' => 'CNIC COPY OF NOTIFY  (PDF)',
                'type' => 'pdf'
            ],
            [
                'title' => 'ORIGNAL TRAVEL HISTORY FROM FIA',
                'type' => 'image'
            ],
            [
                'title' => 'FAMILY REGISTRATION CERTIFICATE (FRC) PDF (NADRA)',
                'type' => 'pdf'
            ],
            [
                'title' => 'BANK STATEMENT FROM OUT OF COUNTRY BANK ACCOUNT (PDF)',
                'type' => 'pdf'
            ],
            [
                'title' => 'ACTIVE TAX FILER NTN  (PDF)',
                'type' => 'pdf'
            ],
            [
                'title' => 'ORIGNAL BL & EXPORT CERTIFICATE',
                'type' => 'image'
            ],
        ]);
    }
}
