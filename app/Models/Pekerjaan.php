<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'pekerjaan';
    public $timestamps = false;
    protected $guarded = [];

    public function pekerjaan()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function jenis_pekerjaan()
    {
        return $this->belongsTo(\App\Models\JenisPekerjaan::class, 'jenis_pekerjaan_id', 'id_jenis_pekerjaan');
    }
}



