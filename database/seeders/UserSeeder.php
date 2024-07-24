<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nim"=>"220411100113",
            "email"=>"andreeka852@gmail.com",
            "name"=>"Andre Eka",
            "password"=>"password",
            "tahun_masuk"=>"2022",
            "tahun_lulus"=>"2025",
            "prodi"=>1,
            "approved"=>"1"
        ]);

        User::create([
            "nim"=>"220411100081",
            "email"=>"bagusputraanugrah123@gmail.com",
            "name"=>"Bagus Satria",
            "password"=>"password",
            "tahun_masuk"=>"2022",
            "tahun_lulus"=>"2025",
            "prodi"=>2
        ]);

        User::create([
            "nim"=>"220411100108",
            "email"=>"umuchtar0@gmail.com",
            "name"=>"Umar Muchtar",
            "password"=>"password",
            "tahun_masuk"=>"2022",
            "tahun_lulus"=>"2026",
            "prodi"=>1
        ]);

        User::create([
            "nim"=>"210411100076",
            "email"=>"glendyhernandez0@gmail.com",
            "name"=>"Glendy Hernandez",
            "password"=>"password",
            "tahun_masuk"=>"2021",
            "tahun_lulus"=>"2024",
            "prodi"=>3,
        ]);
    }
}
