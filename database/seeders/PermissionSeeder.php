<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insertOrIgnore(
            [
                // permissions for user operation
                ['name' => 'user_list',         'guard_name' => 'web'],
                ['name' => 'user_show',         'guard_name' => 'web'],
                ['name' => 'user_create',       'guard_name' => 'web'],
                ['name' => 'user_update',       'guard_name' => 'web'],
                ['name' => 'user_delete',       'guard_name' => 'web'],

                // permissions for role operation
                ['name' => 'role_list',         'guard_name' => 'web'],
                ['name' => 'role_create',       'guard_name' => 'web'],
                ['name' => 'role_update',       'guard_name' => 'web'],
                ['name' => 'role_delete',       'guard_name' => 'web'],

                // permissions for post operation
                ['name' => 'post_list',         'guard_name' => 'web'],
                ['name' => 'post_create',       'guard_name' => 'web'],
                ['name' => 'post_update',       'guard_name' => 'web'],
                ['name' => 'post_delete',       'guard_name' => 'web'],

                 // permissions for reserve operation
                ['name' => 'rent_list',         'guard_name' => 'web'],
                //  ['name' => 'post_create',       'guard_name' => 'web'],
                //  ['name' => 'post_update',       'guard_name' => 'web'],
                //  ['name' => 'post_delete',       'guard_name' => 'web'],
            ]
        );
    }
}
