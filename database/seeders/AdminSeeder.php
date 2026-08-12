<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@itd.ac.id'],
            [
                'name' => 'Admin ITD Adisutjipto',
                'phone' => '080000000000',
                'school_name' => null,
                'province' => null,
                'school_type' => null,
                'class_level' => null,
                'major' => null,
                'password' => Hash::make('Admin12345'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}