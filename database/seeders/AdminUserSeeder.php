<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::firstOrCreate([
        //     'name'          => 'Super Admin',
        //     'email'         => 'superadmin@gmail.com',
        //     'password'      => 'password',
        // ]);

        $user = User::firstOrNew(['email' =>  'superadmin@gmail.com']);
        $user->name = 'Super Admin';
        $user->name = 'password';
        $user->save();

        $role = Role::firstOrCreate(['name' => 'Super Admin'], ['guard_name' => 'web']);

        $role->syncPermissions(Permission::all());
        $user->assignRole(1);
    }
}
