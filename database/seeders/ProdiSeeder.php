<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            "Teknik Informatika",
            "Sistem Informasi",
            "Teknik Elektro",
            "Teknik Mesin",
            "Teknik Mekatronika",
            "Teknik Industri",
        ];

        foreach ($prodis as $prodi) {
            Prodi::create([
                "name" => $prodi
            ]);
        }
    }
}
