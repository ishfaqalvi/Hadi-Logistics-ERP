<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(OfficeSeeder::class);
        // $this->call(SettingsSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(PassportCheckSeeder::class);
        $this->call(VerificationSeeder::class);
        $this->call(ShedSeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(AgentSeeder::class);
        $this->call(ConsigneeSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ExpenditureSeeder::class);
    }
}
