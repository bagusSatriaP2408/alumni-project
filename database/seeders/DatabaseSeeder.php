<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
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
        User::create([
            "email"=>"a@gmail.com",
            "name"=>"ad",
            "password"=>"a",

            ]);
        User::create([
            "email"=>"b@gmail.com",
            "name"=>"tt",
            "password"=>"a",
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Admin::create([
            "email"=>"admin@admin.com",
            "name"=>"a",
            "password"=>"a",

            ]);
    }
}
