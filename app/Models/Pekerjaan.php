<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $primaryKey='id';

    protected $table = 'pekerjaan';

    public $timestamps = false;
    protected $guarded = [
    ];
    // protected $fillable = [
    //     'id',
    //     'user_id',
    //     'nama_pekerjaan',
    //     'alamat_perusahaan',
    //     'mulai_bekerja',
    //     'selesai_bekerja',
    // ];
    public function pekerjaan()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    // public function jenisPekerjaan()
    // {
    //     return $this->belongsTo(\App\Models\Pekerjaan::class, 'jenis_pekerjaan_id', 'id_jenis_pekerjaan');
    // }

}
