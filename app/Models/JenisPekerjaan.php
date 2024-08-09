<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    use HasFactory;
    
    protected $table = 'jenis_pekerjaans';
    protected $guarded = ['id_jenis_pekerjaan'];
    protected $primaryKey = 'id_jenis_pekerjaan';

    protected $fillable = ['nama_pekerjaan', 'type'];

    public function jenis_pekerjaan()
    {
        return $this->hasMany(\App\Models\Pekerjaan::class, 'jenis_pekerjaan_id', 'id_jenis_pekerjaan');
    }
}
