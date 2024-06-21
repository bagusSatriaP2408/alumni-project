<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class HasilKuisioner extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey='id_hasil_kuisioner';

    protected $table = 'hasil_kuisioner';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_hasil_kuisioner', 'nim', 'id_kuisioner', 'hasil_kuisioner',];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kuisioner()
    {
        return $this->belongsTo(\App\Models\Kuisioner::class, 'id_kuisioner', 'id_kuisioner');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lulusan()
    {
        return $this->belongsTo(\App\Models\User::class, 'nim', 'nim');
    }
    
}
