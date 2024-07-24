<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuisionerVendor extends Model
{
    use HasFactory;
    protected $primaryKey='id_hasil_kuisioner_vendor';

    protected $table = 'hasil_kuisioner_vendors';

    public $timestamps = false;
    protected $fillable = ['id_kuisioner', 'vendor_id','id_main_hasil_kuisioner'];

    public function kuisioner()
    {
        return $this->belongsTo(\App\Models\Kuisioner::class, 'id_kuisioner', 'id_kuisioner');
    }

    public function vendors()
    {
        return $this->belongsTo(\App\Models\Vendor::class,'vendor_id', 'id');
    }
    public function main_hasil_kuisioner()
    {
        return $this->belongsTo(\App\Models\Main_hasil_kuisioner::class,'id_main_hasil_kuisioner', 'id_main_hasil_kuisioner');
    }
}
