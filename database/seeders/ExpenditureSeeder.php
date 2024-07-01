<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ExpenditureSeeder extends Seeder
{
    public function run()
    {
        $users = [2, 3];
        foreach ($users as $userId) {
            for ($i = 1; $i <= 5; $i++) {
                $title = "Expenditure " . $i; // Use a more meaningful title
                $type = $i % 2 == 0 ? 'Customer' : 'Personal'; // Keep the alternating types
                DB::table('expenditures')->insert([
                    'user_id' => $userId,
                    'title' => $title,
                    'type' => $type,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
