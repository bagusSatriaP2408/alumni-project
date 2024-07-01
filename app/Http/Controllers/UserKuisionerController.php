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
        $userId = auth()->user()->nim;
        $userId = auth()->user()->nim;
        $hasil = Kuisioner::with(['mainKuisioner', 'hasilKuisioner'])
                        ->whereHas('hasilKuisioner', function ($query) use ($userId) {
                            $query->where('nim','!=', $userId);
                        })
                        ->get();
        $c_hasil1=Kuisioner::count();
        $c_hasil2=count($hasil);                   
        if ($c_hasil1==$c_hasil2) {
            $main_kuisioner = null;
            return view('kuisioner.index',compact('main_kuisioner'));
        }else{
            $main_kuisioner=MainKuisioner::with('kuisioner.hasilkuisioner')->whereDoesntHave('kuisioner.hasilkuisioner',function ($query) use ($userId) {
                $query->where('nim', $userId);
            })
            ->get();
            // $unique_main_kuisioner_id = $main_kuisioner->pluck('mainKuisioner')->all();
            // dd($unique_main_kuisioner_id);
            return view('kuisioner.index', compact('main_kuisioner'));
            
        }
        // Jika belum ada isian kuisioner, sertakan $hasilkuisioner saat memanggil view
    }

    public function show2($id)
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
    public function show($id)
    {
        $kuisioner = Kuisioner::with(['main_hasil_kuisioner','mainKuisioner'])->where('id_main_kuisioner', $id)->get();
        // Cek jika kuisioner tidak ditemukan
        if ($kuisioner->isEmpty()) {
            return redirect()->route('kuisioner')->with('error', 'Kuisioner not found');
        }
        return view('kuisioner.show', compact('kuisioner'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'id_kuisioner' => 'required|array',
            'jawaban' => 'required|array',
        ]);
    
        // Get the authenticated user
        $user = $request->user();
    
        // Loop through submitted data and save to HasilKuisioner
        foreach ($request->id_kuisioner as $key => $id_kuisioner) {
            HasilKuisioner::create([
                'nim' => $user->nim,
                'id_kuisioner' => $id_kuisioner,
                'id_main_hasil_kuisioner' => $request->jawaban[$key],
                // Add other fields as needed
            ]);
        }
    
        // Redirect or respond as needed
        return redirect()->route('kuisioner.index');
    }    

}
