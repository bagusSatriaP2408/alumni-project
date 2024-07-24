<?php

namespace Database\Seeders;

use App\Models\JenisPekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pekerjaan = [
            // Pekerjaan IT
            ['nama_pekerjaan' => 'Machine Learning Developer', 'type' => '1'],
            ['nama_pekerjaan' => 'Web Developer', 'type' => '1'],
            ['nama_pekerjaan' => 'Computer Networking Specialist', 'type' => '1'],
            ['nama_pekerjaan' => 'Cloud Computing Engineer', 'type' => '1'],
            ['nama_pekerjaan' => 'Software Developer', 'type' => '1'],
            ['nama_pekerjaan' => 'Cybersecurity Specialist', 'type' => '1'],
            ['nama_pekerjaan' => 'Data Scientist', 'type' => '1'],
            ['nama_pekerjaan' => 'Database Administrator', 'type' => '1'],
            ['nama_pekerjaan' => 'DevOps Engineer', 'type' => '1'],
            ['nama_pekerjaan' => 'Mobile Application Developer', 'type' => '1'],

            // Pekerjaan Non-IT
            ['nama_pekerjaan' => 'Pedagang', 'type' => '0'],
            ['nama_pekerjaan' => 'Petani', 'type' => '0'],
            ['nama_pekerjaan' => 'Nelayan', 'type' => '0'],
            ['nama_pekerjaan' => 'Akuntansi', 'type' => '0'],
            ['nama_pekerjaan' => 'Guru', 'type' => '0'],
            ['nama_pekerjaan' => 'Dokter', 'type' => '0'],
            ['nama_pekerjaan' => 'Perawat', 'type' => '0'],
            ['nama_pekerjaan' => 'Pengacara', 'type' => '0'],
            ['nama_pekerjaan' => 'Arsitek', 'type' => '0'],
        ];

        foreach ($pekerjaan as $jenis) {
            JenisPekerjaan::create($jenis);
        }
    }
}
