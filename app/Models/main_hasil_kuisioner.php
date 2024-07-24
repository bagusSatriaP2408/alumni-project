<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_hasil_kuisioner extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'main_hasil_kuisioner';

    // Primary key
    protected $primaryKey = 'id_main_hasil_kuisioner';
    public $timestamps = false;

    // Kolom yang bisa diisi
    protected $fillable = [
        'inputan',
        'id_kuisioner'
    ];

    // Relasi dengan model Kuisioner
    public function kuisioner()
    {
        return $this->belongsTo(\App\Models\Kuisioner::class, 'id_kuisioner', 'id_kuisioner');
    }
    public function hasil_kuisioner()
    {
        return $this->hasMany(\App\Models\HasilKuisioner::class, 'id_main_hasil_kuisioner', 'id_main_hasil_kuisioner');
    }

    public function hasil_kuisioner_vendor()
    {
        return $this->hasMany(\App\Models\HasilKuisionerVendor::class, 'id_main_hasil_kuisioner', 'id_main_hasil_kuisioner');
    }
}
