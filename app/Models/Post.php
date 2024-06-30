<?php

namespace App\Models;

// use App\Enums\StoreStatus;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(PostObserver::class)]

class Post extends Model
{
    protected $fillable = [
        'gambar',
        'judul',
        'slug',
        'deskripsi',
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'status' => StoreStatus::class,
    //     ];
    // }

    public function user() :BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

}
