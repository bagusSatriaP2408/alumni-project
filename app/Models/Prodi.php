<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{

    use HasFactory;
    protected $primaryKey='id';

    protected $table = 'prodi';

    public $timestamps = false;
    protected $fillable = [
        'id',
        'name'
    ];

    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'prodi', 'id');
    }
}
