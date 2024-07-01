<?php

use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\PostController;
use App\Models\MainKuisioner;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('posts', [Controllers\PostController::class, 'index'])->name('posts.index');


Route::get('search', [Controllers\SearchController::class, 'index'])->name('search.index');
Route::get('search/profile/{id}', [Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::post('search', [Controllers\SearchController::class, 'search'])->name('search.search');

Route::middleware('auth')->group(function () {
    Route::resource('posts', Controllers\PostController::class)->except(['index', 'show']);
    Route::get('/my-posts', [Controllers\PostController::class, 'userPosts'])->name('posts.user_posts');
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('kuisioner',Controllers\UserKuisionerController::class);
    Route::post('/profile/pekerjaan', [Controllers\ProfileController::class, 'store_pekerjaan'])->name('profile.store_pekerjaan');
    Route::patch('/profile/pekerjaan', [Controllers\ProfileController::class, 'update_pekerjaan'])->name('profile.update_pekerjaan');
});

Route::group(['prefix' => 'Admin', 'middleware' => ['auth:web-admin']], function () {
    Route::get('/Dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/Lulusan', [AdminController::class, 'show'])->name('admin.lulusan');
    Route::post('/Lulusan/setujui', [AdminController::class, 'setujui'])->name('admin.lulusan.setujui');
    Route::post('/Lulusan/Tolak', [AdminController::class, 'tolak'])->name('admin.lulusan.tolak');
    Route::get('/kuisioner', [KuisionerController::class, 'index'])->name('admin.kuisioner');
    Route::get('/kuisioner/info/{id}', [KuisionerController::class, 'show'])->name('admin.kuisioner.info');
    Route::get('/kuisioner/create', [KuisionerController::class, 'info_create'])->name('admin.kuisioner.create');
    Route::post('/kuisioner/create', [KuisionerController::class, 'store'])->name('admin.kuisioner.create.store');
    Route::get('/kuisioner/edit/{id}', [KuisionerController::class, 'edit'])->name('admin.kuisioner.edit');
    Route::post('/kuisioner/edit/{id}', [KuisionerController::class, 'edit_store'])->name('admin.kuisioner.edit.store');
    Route::post('/kuisioner/delete/{id}', [KuisionerController::class, 'destroy'])->name('admin.kuisioner.delete');
    Route::get('/kuisioner/hasil/{id}', [KuisionerController::class, 'show_hasil'])->name('admin.kuisioner.hasil');

    Route::get('/postingan', [PostController::class, 'show_admin'])->name('admin.postingan');
    Route::get('/postingan/{slug}', [PostController::class, 'post_admin_detail'])->name('admin.postingan.show');
    Route::post('/postingan/{post}', [PostController::class, 'destroy_admin'])->name('admin.postingan.delete');

    Route::get('kategori-post', [Controllers\PostController::class, 'index_kategori'])->name('kategori-post.index');
    Route::get('kategori-post/create', [Controllers\PostController::class, 'create_kategori'])->name('kategori-post.create');
    Route::post('kategori-post', [Controllers\PostController::class, 'store_kategori'])->name('kategori-post.store');
    Route::get('kategori-post/{id}', [Controllers\PostController::class, 'show'])->name('kategori-post.show');
    Route::get('kategori-post/{id}/edit', [Controllers\PostController::class, 'edit_kategori'])->name('kategori-post.edit');
    Route::put('kategori-post/{id}', [Controllers\PostController::class, 'update_kategori'])->name('kategori-post.update');
    Route::delete('kategori-post/{id}', [Controllers\PostController::class, 'destroy_kategori'])->name('kategori-post.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy_admin'])->name('logout');
});

Route::get('posts/{post}', [Controllers\PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
