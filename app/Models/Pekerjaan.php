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
    protected $fillable = [
        'id',
        'user_id',
        'name'
    ];
    public function Pekerjaan()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
