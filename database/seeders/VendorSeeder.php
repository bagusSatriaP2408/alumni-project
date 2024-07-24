<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'nama_perusahaan' => 'Tokopedia',
            'alamat_perusahaan' => 'Jakarta Timur',
            'email_perusahaan' => 'tokopedia@gmail.com',
        ]);

        Vendor::create([
            'nama_perusahaan' => 'Gojek',
            'alamat_perusahaan' => 'Jakarta Selatan',
            'email_perusahaan' => 'gojek@gmail.com',
        ]);

        Vendor::create([
            'nama_perusahaan' => 'Bukalapak',
            'alamat_perusahaan' => 'Jakarta Barat',
            'email_perusahaan' => 'bukalapak@gmail.com',
        ]);
    }
}
