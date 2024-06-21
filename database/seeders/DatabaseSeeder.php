<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\HasilKuisioner;
use App\Models\Kuisioner;
use App\Models\MainKuisioner;
use App\Models\Pekerjaan;
use App\Models\Post;
use App\Models\Prodi;
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
            "tahun_masuk"=>"2000",
            "tahun_lulus"=>"2005",
            "prodi"=>"1"

            ]);
        User::create([
            "email"=>"b@gmail.com",
            "name"=>"tt",
            "password"=>"a",
            "tahun_masuk"=>"2003",
            "tahun_lulus"=>"2008",
            "prodi"=>"2"
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
        Prodi::create([
            "id"=>"1",
            "name"=>"Teknik Informatika"
        ]);
        Prodi::create([
            "id"=>"2",
            "name"=>"Sistem Informasi"
        ]);
        Pekerjaan::create([
            "id"=>"1",
            "user_id"=>"1",
            "name"=>"fullstack di google"
        ]);
        Pekerjaan::create([
            "id"=>"2",
            "user_id"=>"1",
            "name"=>"enginerring di google"
        ]);
    
    }

}
