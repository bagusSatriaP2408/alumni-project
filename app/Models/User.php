<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $primaryKey='id';

    protected $table = 'users';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
        'tahun_masuk',
        'tahun_lulus',
        'prodi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts() :HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function hasil_kuisioner() :HasMany
    {
        return $this->hasMany(\App\Models\HasilKuisioner::class);
    }
    public function prodi() 
    {
        return $this->belongsTo(\App\Models\Prodi::class, 'prodi', 'id');
    }

    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class);
    }

}
