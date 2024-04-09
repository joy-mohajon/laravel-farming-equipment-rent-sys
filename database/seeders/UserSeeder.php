<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        $adminUser->assignRole('admin');

        $adminUser = User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        $adminUser->assignRole('lender');

        $adminUser = User::create([
            'name' => 'Farmer',
            'email' => 'farmer@gmail.com',
            'password' => bcrypt('1234'),
        ]);
        $adminUser->assignRole('borrower');
    }
}
