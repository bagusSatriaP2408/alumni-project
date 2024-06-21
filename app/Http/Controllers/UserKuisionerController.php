<?php

namespace App\Http\Controllers;

use App\Models\HasilKuisioner;
use App\Models\Kuisioner;
use App\Models\MainKuisioner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserKuisionerController extends Controller
{
    public function index()
    {
        // Ambil ID pengguna saat ini, misalnya:
        $userId = auth()->user()->email;
    
        // Cek apakah ada entri kuisioner yang sudah diisi oleh pengguna
        $hasilkuisioner = HasilKuisioner::where('email', $userId)->first();
        
        // Jika $hasilkuisioner tidak null (artinya sudah ada isian kuisioner), 
        // maka tidak perlu menyertakan $hasilkuisioner saat memanggil view
        if ($hasilkuisioner) {
            $main_kuisioner = null;
            return view('kuisioner.index',compact('main_kuisioner'));
        }else{
            $main_kuisioner = MainKuisioner::all();
            return view('kuisioner.index', compact('main_kuisioner'));
        }
        // Jika belum ada isian kuisioner, sertakan $hasilkuisioner saat memanggil view
    }

    public function show($id)
    {
        $kuisioner = Kuisioner::where('id_main_kuisioner', $id)->get();
        // Cek jika kuisioner tidak ditemukan
        if ($kuisioner->isEmpty()) {
            return redirect()->route('kuisioner')->with('error', 'Kuisioner not found');
        }
    
        // Ambil id_kuisioner dari data kuisioner yang ditemukan
        $kuisionerIds = $kuisioner->pluck('id_kuisioner')->toArray();
    
        // Ambil data hasil_kuisioner berdasarkan id_kuisioner yang ditemukan
        $hasilKuisioner = HasilKuisioner::whereIn('id_kuisioner', $kuisionerIds)->get();
    
        // Return view dengan data dari kedua tabel
        return view('kuisioner.show', compact('kuisioner', 'hasilKuisioner'));
    }
    public function store(Request $request)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            // Sesuaikan dengan field yang dibutuhkan
            'kuisioner' => 'required|array', // Misalnya 'kuisioner' adalah array dari inputan kuisioner
        ]);
    
        // Ambil user yang sedang login
        $user = $request->user(); // Menggunakan user yang sedang authenticated
    
        // Loop through kuisioner inputs and save to hasil_kuisioner
        foreach ($request->kuisioner as $kuisionerId => $response) {
            // Cari kuisioner berdasarkan ID
            $kuisioner = Kuisioner::findOrFail($kuisionerId);
    
            // Simpan data ke hasil_kuisioner
            HasilKuisioner::create([
                'email' => $user->email,
                'id_kuisioner' => $kuisioner->id_kuisioner,
                'hasil_kuisioner' => $response,
                // Sesuaikan dengan field lain yang dibutuhkan
            ]);
        }
    
        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('kuisioner.index');
    }

}
