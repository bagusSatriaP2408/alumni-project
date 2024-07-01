<?php

namespace App\Http\Controllers;

use App\Mail\SendNotif;
use App\Mail\SendTolak;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        // Ambil semua data user tanpa memperhatikan status approved dan menggunakan pagination
        $User = User::paginate();

        // Mengatur kembali nomor halaman (pagination) dengan menggunakan 'page' dari input request
        $User->appends($request->except('page'));

        // Mengembalikan view admin.lulusan dengan semua data user dan pagination
        return view('admin.lulusan', compact('User'))
            ->with('i', ($request->input('page', 1) - 1) * $User->perPage());
    }
    public function setujui(Request $request)
    {
        $confirm="pendaftaran akun anda telah disetujui";
        // Validasi input jika diperlukan
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);     
        // Ambil user berdasarkan ID
        $user = User::findOrFail($request->input('user_id'));
        // Set approved = 1

        $user->approved = 1;
        $user->save();
        $email=$user->email;
        Mail::to($email)->send(new SendNotif($confirm));
        // Redirect kembali ke halaman Admin/Lulusan dengan pesan sukses
        return redirect("/Admin/Lulusan");
    }
    public function tolak(Request $request)
    {
        $con="pendaftaran akun anda ditolak";
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
        
        // Hapus user berdasarkan ID
        $users = User::findOrFail($request->input('user_id'));
        $email= $users->email;
        Mail::to($email)->send(new SendTolak($con));

        User::destroy($request->input('user_id'));
        
        // Redirect kembali ke halaman Admin/Lulusan dengan pesan sukses
        return redirect("/Admin/Lulusan")->with('success', 'User berhasil dihapus.');
    }
}
