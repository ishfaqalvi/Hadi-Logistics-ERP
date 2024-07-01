<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'jobs-list',
            'jobs-view',
            'jobs-create',
            'jobs-edit',
            'jobs-delete',

            'agents-list',
            'agents-view',
            'agents-create',
            'agents-edit',
            'agents-delete',

            'consignees-list',
            'consignees-view',
            'consignees-create',
            'consignees-edit',
            'consignees-delete',

            'customers-list',
            'customers-view',
            'customers-create',
            'customers-edit',
            'customers-delete',

            'roles-list',
            'roles-view',
            'roles-create',
            'roles-edit',
            'roles-delete',

            'users-list',
            'users-view',
            'users-create',
            'users-edit',
            'users-delete',

            'notifications-list',
            'notifications-view',
            'notifications-create',
            'notifications-edit',
            'notifications-delete',
        ];
        $office1 = User::create([
            'name'      => 'Office1 Admin',
            'email'     => 'office1admin@gmail.com',
            'password'  => 'password',
            'type'      => 'Office'
        ]);

        $office2 = User::create([
            'name'      => 'Office2 Admin',
            'email'     => 'office2admin@gmail.com',
            'password'  => 'password',
            'type'      => 'Office'
        ]);

        $role = Role::firstOrCreate(['name' => 'Office Admin'], ['guard_name' => 'web']);

        $role->syncPermissions($permissions);
        $office1->assignRole(2);
        $office2->assignRole(2);
    }
}
