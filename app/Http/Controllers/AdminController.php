<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the admin lulusan page.
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request): View
    {
        // Ambil data user yang memiliki approved = 0 dan menggunakan pagination
        $User = User::where('approved', 0)->paginate();
    
        // Mengatur kembali nomor halaman (pagination) dengan menggunakan 'page' dari input request
        $User->appends($request->except('page'));
    
        // Mengembalikan view admin.lulusan dengan data user yang sudah difilter dan pagination
        return view('admin.lulusan', compact('User'))
            ->with('i', ($request->input('page', 1) - 1) * $User->perPage());
    }
    
    public function setujui(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
    
        // Ambil user berdasarkan ID
        $user = User::findOrFail($request->input('user_id'));
    
        // Set approved = 1
        $user->approved = 1;
        $user->save();
    
        // Redirect kembali ke halaman Admin/Lulusan dengan pesan sukses
        return redirect("/Admin/Lulusan");
    }
    public function tolak(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
    
        // Hapus user berdasarkan ID
        User::destroy($request->input('user_id'));
    
        // Redirect kembali ke halaman Admin/Lulusan dengan pesan sukses
        return redirect("/Admin/Lulusan")->with('success', 'User berhasil dihapus.');
    }
}
