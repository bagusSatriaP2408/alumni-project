<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\HasilKuisioner;
use App\Models\Kuisioner;
use App\Models\MainKuisioner;
use App\Models\Post;
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
        MainKuisioner::create([
            "subject"=>"Test"

        ]);
        Kuisioner::create([
            "id_main_kuisioner"=>1,
            "kuisioner"=>"k1"
        ]);
        Kuisioner::create([
            "id_main_kuisioner"=>1,
            "kuisioner"=>"k2"
        ]);
        Post::create([
            "user_id"=>1,
            "gambar"=>"images/posts/0yQDomtiaZmcgLzJi7phSBctlz630sJ0jng4XffT.jpg",
            "judul"=>"Test",
            "slug"=>"test",
            "deskripsi"=>"test"
        ]);
        HasilKuisioner::create([
            "email"=>"a@gmail.com",
            "id_kuisioner"=>1,
            "hasil_kuisioner"=>"test"
        ]);
        HasilKuisioner::create([
            "email"=>"b@gmail.com",
            "id_kuisioner"=>2,
            "hasil_kuisioner"=>"test"
        ]);

    }

}
