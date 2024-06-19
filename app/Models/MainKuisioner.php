<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MainKuisioner extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey='id_main_kuisioner';

    protected $table = 'main_kuisioner';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_main_kuisioner', 'subject'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kuisioner()
    {
        return $this->hasMany(\App\Models\Kuisioner::class, 'id_main_kuisioner', 'id_main_kuisioner');
    }
    
}

