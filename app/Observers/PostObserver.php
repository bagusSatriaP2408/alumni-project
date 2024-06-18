<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    public function creating(Post $post): void 
    {
        $post->slug = str()->slug($post->judul);
    }
}
