<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Admin User
        User::create([
            'first_name' => 'Admin',
            'last_name'  => 'Admin',
            'school_id'  => '2026-00001-MN-0',
            'email'      => 'admin@pup.edu.ph',
            'password'   => Hash::make('secret'),
            'role_id'    => 2,
        ]);

        // Default Student User
        User::create([
            'first_name' => 'Student',
            'last_name'  => 'Student',
            'school_id'  => '2026-00002-MN-0',
            'email'      => 'student@iskolarngbayan.pup.edu.ph',
            'password'   => Hash::make('secret'),
            'role_id'    => 1,
        ]);

        User::factory()->student()->count(10)->create();

        User::factory()->faculty()->count(5)->create();
    }
}
