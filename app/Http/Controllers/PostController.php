<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Enums\postStatus;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->latest()
            ->get();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    public function show_admin(Request $request): View
    {
        $posts = Post::with('user')->latest()->get();

        return view('admin.postingan', compact('posts'));
    }

    
        
        /**
         * Show the form for creating a new resource.
         */
    public function create()
    {
        return view('posts.form', [
            'posts' => new Post(),
            'page_meta' => [
                'title' => 'Buat Postingan',
                'description' => 'Buat postingan baru',
                'method' => 'POST',
                'url' => route('posts.store'),
            ]
        ]);
    }

    /**
     * post a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $file = $request->file('gambar');

        $request->user()->posts()->create([
            ...$request->validated(),
            ...['gambar' => $file->store('images/posts')]
        ]);

        return to_route('posts.user_posts');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function post_admin_detail($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('admin.postingan-show', compact('post'));
    }

    public function userPosts(Request $request)
    {
        $user = $request->user();
        $posts = $user->posts()->latest()->get();
        return view('posts.detail', compact('posts'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post)
    {
        // dd('tes');
        Gate::authorize('update', $post);
        // abort_if($request->user()->isNot($post->user), 401);

        return view('posts.form', [
            'posts' => $post,
            'page_meta' => [
                'title' => 'Edit post',
                'description' => 'Edit post:' . $post->judul,
                'method' => 'PUT',
                'url' => route('posts.update', $post)
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, post $post)
    {
        if ($request->hasFile('gambar')) {
            Storage::delete($post->gambar);
            $file = $request->file('gambar')->store('images/posts');
        } else { 
            $file = $post->gambar;
        }

        $post->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $file,
        ]);

        return to_route('posts.user_posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   
        $post->delete();
        return redirect()->route('posts.detail')->with('success', 'Post berhasil dihapus!');
    }
    public function destroy_admin(Post $post)
    {   
        $post->delete();
        return redirect()->route('admin.postingan')->with('success', 'Post berhasil dihapus!');
    }
}
