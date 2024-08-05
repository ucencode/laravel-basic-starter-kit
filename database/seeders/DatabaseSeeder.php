<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $default_email = 'admin@example.com';
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => $default_email,
        ]);
    }
}
