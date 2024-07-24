<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'email_perusahaan',
    ];

    public function hasil_kuisioner() :HasMany
    {
        return $this->hasMany(\App\Models\HasilKuisionerVendor::class);
    }
}
