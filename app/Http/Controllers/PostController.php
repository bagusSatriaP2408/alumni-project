<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Enums\postStatus;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Middleware\Authorize;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::where(function ($query) use ($request) {
            // Filter berdasarkan kategori jika parameter 'category' ada
            if ($request->has('category') && $request->category != '') {
                $query->where('kategori_id', $request->category);
            }
        })->get();

        $categories = PostCategory::all(); 

        return view('posts.index', compact('posts', 'categories'));
    }

    public function index_kategori()
    {
        $categories = PostCategory::all();
        return view('admin.kategori-post.index', compact('categories'));
    }

    public function show_admin(Request $request): View
    {
        $posts = Post::where(function ($query) use ($request) {
            if ($request->has('category') && $request->category != '') {
                $query->where('kategori_id', $request->category);
            }
        })->with('user')->latest()->get();
        $categories = PostCategory::all(); // Pastikan ini ada untuk mengisi dropdown
        return view('admin.postingan', compact('posts', 'categories'));
    }

        
        /**
         * Show the form for creating a new resource.
         */
    public function create()
    {
        $categories = PostCategory::all();
        return view('posts.form', [
            'categories' => $categories,
            'posts' => new Post(),
            'page_meta' => [
                'title' => 'Buat Postingan',
                'description' => 'Buat postingan baru',
                'method' => 'POST',
                'url' => route('posts.store'),
            ]
        ]);
    }

    public function create_kategori()
    {
        return view('admin.kategori-post.create');
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

    public function store_kategori(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $category = new PostCategory();
        $category->nama_kategori = $validatedData['nama_kategori'];
        $category->save();

        return redirect()->route('kategori-post.index')->with('success', 'Kategori berhasil ditambahkan!');
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
        $categories = PostCategory::all();

        return view('posts.form', [
            'posts' => $post,
            'categories' => $categories,
            'page_meta' => [
                'title' => 'Edit post',
                'description' => 'Edit post:' . $post->judul,
                'method' => 'PUT',
                'url' => route('posts.update', $post)
            ]
        ]);
    }

    public function edit_kategori($id)
    {
        $category = PostCategory::where('id_kategori', $id)->first();;
        return view('admin.kategori-post.edit', compact('category'));
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
            'kategori_id' => $request->kategori_id,
            'gambar' => $file,
        ]);

        return to_route('posts.user_posts');
    }

    /**
     * Update the specified category in storage.
     */
    public function update_kategori(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
        $category = PostCategory::where('id_kategori', $id)->first();
        $category->nama_kategori = $validatedData['nama_kategori'];
        $category->save();
        return redirect()->route('kategori-post.index')->with('success', 'Kategori berhasil diperbarui!');
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

    /**
     * Remove the specified category from storage.
     */
    public function destroy_kategori($id)
    {   
        $category = PostCategory::where('id_kategori', $id)->first();
        $category->delete();
        return redirect()->route('kategori-post.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
