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
        // if default user is needed : ahmadhuseinh.03@gmail.com
        if (User::where('email', 'ahmadhuseinh.03@gmail.com')->doesntExist()) {
            \App\Models\User::factory()->create([
                'name' => 'Admin',
                'email' => 'ahmadhuseinh.03@gmail.com',
                'password' => '$2y$10$XmNyzKbiHdIS44z3mT6ZsO137.wc9iFhfFSmMGxBZoSfPmd46S.v2', // Password : I<3HerSoMuch
                'role' => 'admin',
            ]);
        }

        // Create 10 random users
        \App\Models\User::factory(10)->create();
    }
}
