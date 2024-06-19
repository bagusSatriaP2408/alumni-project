<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Kuisioner extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey='id_kuisioner';

    protected $table = 'kuisioner';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_kuisioner','id_main_kuisioner','kuisioner'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasilKuisioners()
    {
        return $this->hasMany(\App\Models\HasilKuisioner::class, 'id_kuisioner', 'id_kuisioner');
    }
    
}
