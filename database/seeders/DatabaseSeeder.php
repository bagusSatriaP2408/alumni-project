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
        $this->call([
            ProdiSeeder::class,
            PostCategorySeeder::class,
            JenisPekerjaanSeeder::class,
            UserSeeder::class,
            PekerjaanSeeder::class,
            VendorSeeder::class,
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

        Post::create([
            "user_id"=>1,
            "gambar"=>"images/posts/yDZOs5s187vBoF4xmZLQFkN55E7avdC3nA6k7WHP.jpg",
            "judul"=>"Postingan 1",
            "slug"=>"postingan-1",
            "deskripsi"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi. Sed euismod, nunc id aliquet ultricies, nisl nisl tincidunt nunc, ac ultrices nunc nunc id nunc. Sed id est id nunc lacinia tincidunt. Nulla facilisi.",
            "kategori_id"=>1
        ]);
        
        
    }

}
