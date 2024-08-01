<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $alumni = User::where('approved', 1)->limit(5)->get();
        $daftar_angkatan = User::pluck('tahun_masuk')->unique()->sort();
        $jumlah_alumni = User::count();
        $jumlah_kerja = Pekerjaan::pluck('user_id')->unique()->count();
        $presentase_sukses = ($jumlah_kerja / $jumlah_alumni) * 100;
        $vendors = Vendor::limit(3)->get();
        return view('home', compact('alumni', 'daftar_angkatan', 'jumlah_alumni', 'jumlah_kerja', 'presentase_sukses', 'vendors'));
    }
}
