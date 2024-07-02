<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    use HasFactory;
    protected $guarded = ["id_jenis_pekerjaan"];
    protected $primaryKey='id_jenis_pekerjaan';

    protected $fillable = ['nama_pekerjaan'];

    // public function jenisPekerjaan()
    // {
    //     return $this->hasMany(Pekerjaan::class);
    // }
}
