<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $permissions = Permission::all()->pluck('name');
        $admin->givePermissionTo($permissions);

        $borrower = Role::create(['name' => 'borrower', 'guard_name' => 'web']);
        $borrowerPermissions = [
            'post_list',
            'post_create',
            'post_update',
            'post_delete'
        ];
        $borrowerPermissionObjects = Permission::whereIn('name', $borrowerPermissions)->get();
        $borrower->syncPermissions($borrowerPermissionObjects);

        $lender = Role::create(['name' => 'lender', 'guard_name' => 'web']);
        $lenderPermissions = [
            'rent_equipment',
        ];
        $lenderPermissionObjects = Permission::whereIn('name', $lenderPermissions)->get();
        $lender->syncPermissions($lenderPermissionObjects);
    }
}
