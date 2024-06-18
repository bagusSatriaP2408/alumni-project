<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey='id';

    protected $casts = [
        'password' => 'hashed',
    ];

    protected $table = 'admin';

    protected $fillable=[
        'name',
        'email',
        'password',
        
    ];
}