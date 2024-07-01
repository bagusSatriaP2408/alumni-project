<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\HasilKuisioner;
use App\Models\JenisPekerjaan;
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
        Prodi::create([
            "id"=>"1",
            "name"=>"Teknik Informatika"
        ]);
        Prodi::create([
            "id"=>"2",
            "name"=>"Sistem Informasi"
        ]);

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
            "nim"=>"200411100081",
            "email"=>"bagus081@gmail.com",
            "name"=>"Bagus Satria",
            "password"=>"password",
            "tahun_masuk"=>"2022",
            "tahun_lulus"=>"2024",
            "prodi"=>2
        ]);

        Admin::create([
            "email"=>"admin@admin.com",
            "name"=>"Admin",
            "password"=>"a",
        ]);

        MainKuisioner::create([
            "subject"=>"Kuisioner 1"
        ]);

        Kuisioner::create([
            "id_main_kuisioner"=>1,
            "kuisioner"=>"Pertanyaan 1"
        ]);

        Kuisioner::create([
            "id_main_kuisioner"=>1,
            "kuisioner"=>"Pertanyaan 2"
        ]);

        Post::create([
            "user_id"=>1,
            "gambar"=>"images/posts/0yQDomtiaZmcgLzJi7phSBctlz630sJ0jng4XffT.jpg",
            "judul"=>"Postingan 1",
            "slug"=>"postingan-1",
            "deskripsi"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi. Sed euismod, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi.",
        ]);

        HasilKuisioner::create([
            "nim"=>"220411100113",
            "id_kuisioner"=>1,
            "hasil_kuisioner"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi. Sed euismod, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi.",
        ]);

        HasilKuisioner::create([
            "nim"=>"220411100113",
            "id_kuisioner"=>2,
            "hasil_kuisioner"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi.",
        ]);
        
        // Pekerjaan::create([
        //     "id"=>"1",
        //     "user_id"=>"1",
        //     "name"=>"fullstack di google"
        // ]);
        // Pekerjaan::create([
        //     "id"=>"2",
        //     "user_id"=>"1",
        //     "name"=>"enginerring di google"
        // ]);
        
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>1,
            'nama_pekerjaan'=>'Machine Learning Developer'
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>2,
            'nama_pekerjaan'=>'Fullstack Developer'
        ]);
    }

}
