<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tesminatbakat.com'],
            [
                'name' => 'Administrator',
                'phone' => '000000000000',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
                'profile_photo' => 'profile-photos/admin-avatar.png',
                'school_name' => null,
                'province' => null,
                'school_type' => null,
                'class_level' => null,
                'major' => null,
            ]
        );
    }
}