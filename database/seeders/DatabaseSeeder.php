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
use App\Models\PostCategory;
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
        User::create([
            "nim"=>"200411100011",
            "email"=>"bagus01@gmail.com",
            "name"=>"Bagus Satria",
            "password"=>"password",
            "tahun_masuk"=>"2022",
            "tahun_lulus"=>"2024",
            "prodi"=>1
        ]);
        User::create([
            "nim"=>"200411100001",
            "email"=>"bagus0111@gmail.com",
            "name"=>"Bagus Satria",
            "password"=>"password",
            "tahun_masuk"=>"2022",
            "tahun_lulus"=>"2024",
            "prodi"=>1
        ]);

        Admin::create([
            "email"=>"admin@admin.com",
            "name"=>"Admin",
            "password"=>"a",
        ]);

        MainKuisioner::create([
            "subject"=>"Kuisioner 1",
            "type"=>"alumni",
        ]);

        Kuisioner::create([
            "id_main_kuisioner"=>1,
            "kuisioner"=>"Pertanyaan 1"
        ]);

        Kuisioner::create([
            "id_main_kuisioner"=>1,
            "kuisioner"=>"Pertanyaan 2"
        ]);

        PostCategory::create([
            "nama_kategori"=>"Lowongan Kerja"
        ]); 

        PostCategory::create([
            "nama_kategori"=>"Seminar"
        ]); 
        Post::create([
            "user_id"=>1,
            "gambar"=>"images/posts/yDZOs5s187vBoF4xmZLQFkN55E7avdC3nA6k7WHP.jpg",
            "judul"=>"Postingan 1",
            "slug"=>"postingan-1",
            "deskripsi"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi. Sed euismod, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi.",
            "kategori_id"=>1
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>1,
            'nama_pekerjaan'=>'Machine Learning Developer',
            'type'=>'1'
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>2,
            'nama_pekerjaan'=>'Web Developer',
            'type'=>'1'
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>3,
            'nama_pekerjaan'=>'Computer networking specialist',
            'type'=>'1'
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>4,
            'nama_pekerjaan'=>'Cloud computing engineer',
            'type'=>'1'
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>5,
            'nama_pekerjaan'=>'Software developer',
            'type'=>'1'
        ]);
        JenisPekerjaan::create([
            'id_jenis_pekerjaan'=>6,
            'nama_pekerjaan'=>'pedagang',
            'type'=>'0'
        ]);
        Pekerjaan::create([
            "id"=>1,
            "user_id"=>1,
            "jenis_pekerjaan_id"=>1,
            "nama_perusahaan"=>"tokpedia",
            "alamat_perusahaan"=>"jakarta"
        ]);
        Pekerjaan::create([
            "id"=>2,
            "user_id"=>2,
            "jenis_pekerjaan_id"=>2,
            "nama_perusahaan"=>"Google",
            "alamat_perusahaan"=>"jakarta"
        ]);
        Pekerjaan::create([
            "id"=>3,
            "user_id"=>3,
            "jenis_pekerjaan_id"=>3,
            "nama_perusahaan"=>"Google",
            "alamat_perusahaan"=>"jakarta"
        ]);
        Pekerjaan::create([
            "id"=>4,
            "user_id"=>4,
            "jenis_pekerjaan_id"=>2,
            "nama_perusahaan"=>"Google",
            "alamat_perusahaan"=>"jakarta"
        ]);
    }

}
