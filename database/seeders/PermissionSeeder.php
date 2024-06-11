<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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

            'audits-list',
            'audits-view',
            'audits-create',
            'audits-edit',
            'audits-delete',

            'logs-list',
            'logs-view',
            'logs-create',
            'logs-edit',
            'logs-delete',

            'settings-list',
            'settings-create',

            'vehicleCompanies-list',
            'vehicleCompanies-view',
            'vehicleCompanies-create',
            'vehicleCompanies-edit',
            'vehicleCompanies-delete',

            'vehicles-list',
            'vehicles-view',
            'vehicles-create',
            'vehicles-edit',
            'vehicles-delete',

            'documents-list',
            'documents-view',
            'documents-create',
            'documents-edit',
            'documents-delete',

            'passportChecks-list',
            'passportChecks-view',
            'passportChecks-create',
            'passportChecks-edit',
            'passportChecks-delete',

            'verifications-list',
            'verifications-view',
            'verifications-create',
            'verifications-edit',
            'verifications-delete',

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

            'sheds-list',
            'sheds-view',
            'sheds-create',
            'sheds-edit',
            'sheds-delete',

            'jobes-list',
            'jobes-view',
            'jobes-create',
            'jobes-edit',
            'jobes-delete',


        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
