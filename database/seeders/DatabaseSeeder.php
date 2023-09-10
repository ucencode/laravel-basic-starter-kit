<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // if default user is needed : admin@example.com
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            \App\Models\User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => '$2y$10$VvAbVtzRhYv6hBhRM9UXCOPbDbPsXjrft1nOSIxuV51/s2uxsEdV.', // Password : admin
            ]);
        }

        // Create 10 random users
        \App\Models\User::factory(10)->create();
    }
}
