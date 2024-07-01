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
            'offices-list',
            'offices-view',
            'offices-create',
            'offices-edit',
            'offices-delete',
            
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

            'documents-list',
            'documents-view',
            'documents-create',
            'documents-edit',
            'documents-delete',

            'verifications-list',
            'verifications-view',
            'verifications-create',
            'verifications-edit',
            'verifications-delete',

            'passportChecks-list',
            'passportChecks-view',
            'passportChecks-create',
            'passportChecks-edit',
            'passportChecks-delete',

            'vehicles-list',
            'vehicles-view',
            'vehicles-create',
            'vehicles-edit',
            'vehicles-delete',

            'vehicleCompanies-list',
            'vehicleCompanies-view',
            'vehicleCompanies-create',
            'vehicleCompanies-edit',
            'vehicleCompanies-delete',

            'sheds-list',
            'sheds-view',
            'sheds-create',
            'sheds-edit',
            'sheds-delete',

            'expenditures-list',
            'expenditures-view',
            'expenditures-create',
            'expenditures-edit',
            'expenditures-delete',

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
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
