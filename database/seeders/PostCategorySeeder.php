<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Lowongan Kerja",
            "Seminar",
            "Pelatihan",
            "Event",
            "Berita",
            "Testimonial",
            "Penghargaan",
            "Pengumuman",
            "Tips & Trik",
            "Wawancara Alumni"
        ];

        foreach ($categories as $category) {
            PostCategory::create([
                "nama_kategori" => $category
            ]);
        }
    }
}
