<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\MainKuisioner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KuisionerRequest;
use App\Models\HasilKuisioner;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        $main_kuisioner = MainKuisioner::all();
        return view('admin.kuisioner.index', compact('main_kuisioner'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'subject' => 'required|string|max:255',
        'kuisioner' => 'required|array|min:1',
        'kuisioner.*' => 'required|string|max:255',
    ]);

    // Buat entry baru di tabel MainKuisioner
    $mainKuisioner = MainKuisioner::create([
        'subject' => $request->subject,
    ]);

    // Ambil id_main_kuisioner yang baru saja dibuat
    $id_main_kuisioner = $mainKuisioner->id_main_kuisioner;

    // Simpan kuisioner yang terkait dengan MainKuisioner baru
    foreach ($request->kuisioner as $item) {
        Kuisioner::create([
            'id_main_kuisioner' => $id_main_kuisioner,
            'kuisioner' => $item
        ]);
    }

    // Redirect ke halaman index kuisioner atau lakukan sesuatu yang sesuai
    return redirect()->route('admin.kuisioner')->with('success', 'Kuisioner created successfully.');
}
    public function info_create():View{
        return view('admin.kuisioner.create');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kuisioner = Kuisioner::where('id_main_kuisioner', $id)->get();
    if (!$kuisioner) {
        // Handle the case where the kuisioner is not found
        return redirect()->route('admin.kuisioner')->with('error', 'Kuisioner not found');
    }

    // Return the view with the found kuisioner
    return view('admin.kuisioner.info', compact('kuisioner'));
    }
    public function show_hasil($id)
    {
        // Ambil data kuisioner berdasarkan id_main_kuisioner
        $kuisioner = Kuisioner::where('id_main_kuisioner', $id)->get();
    
        // Cek jika kuisioner tidak ditemukan
        if ($kuisioner->isEmpty()) {
            return redirect()->route('admin.kuisioner')->with('error', 'Kuisioner not found');
        }
    
        // Ambil id_kuisioner dari data kuisioner yang ditemukan
        $kuisionerIds = $kuisioner->pluck('id_kuisioner')->toArray();
    
        // Ambil data hasil_kuisioner berdasarkan id_kuisioner yang ditemukan
        $hasilKuisioner = HasilKuisioner::whereIn('id_kuisioner', $kuisionerIds)->get();
    
        // Return view dengan data dari kedua tabel
        return view('admin.kuisioner.hasil', compact('kuisioner', 'hasilKuisioner'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data Kuisioner beserta data MainKuisioner yang terkait
        $kuis = MainKuisioner::with('kuisioner')->find($id);
        // Jika $kuis tidak ditemukan, bisa ditangani sesuai kebutuhan
        if (!$kuis) {
            // Lakukan redirect atau tindakan lain
            return redirect()->back()->with('error', 'Kuisioner not found.');
        };
        return view('admin.kuisioner.edit', compact('kuis'));
    }
    public function edit_store(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'subject' => 'required|string|max:255',
        'kuisioner' => 'required|array|min:1',
        'kuisioner.*' => 'required|string|max:255',
    ]);

    // Temukan MainKuisioner berdasarkan $id
    $mainKuisioner = MainKuisioner::findOrFail($id);

    // Update subject MainKuisioner
    $mainKuisioner->subject = $request->subject;
    $mainKuisioner->save();

    // Hapus kuisioner yang terkait dengan MainKuisioner sebelumnya
    Kuisioner::where('id_main_kuisioner', $id)->delete();

    // Simpan kuisioner yang terkait dengan MainKuisioner yang diupdate
    foreach ($request->kuisioner as $item) {
        Kuisioner::updateOrCreate(
            ['id_main_kuisioner' => $id, 'kuisioner' => $item],
            ['id_main_kuisioner' => $id, 'kuisioner' => $item]
        );
    }

    // Redirect ke halaman index kuisioner atau lakukan sesuatu yang sesuai
    return redirect()->route('admin.kuisioner.edit', ['id' => $id])->with('success', 'Kuisioner updated successfully.');
}



    public function destroy($id): RedirectResponse
    {
        // Temukan MainKuisioner berdasarkan $id
        $mainKuisioner = MainKuisioner::findOrFail($id);
    
        // Hapus semua Kuisioner terkait dengan MainKuisioner
        $kuisionerList = Kuisioner::where('id_main_kuisioner', $mainKuisioner->id_main_kuisioner)->get();
    
        foreach ($kuisionerList as $kuisioner) {
            // Hapus semua HasilKuisioner terkait dengan Kuisioner
            HasilKuisioner::where('id_kuisioner', $kuisioner->id_kuisioner)->delete();
            
            // Hapus Kuisioner
            $kuisioner->delete();
        }
    
        // Hapus MainKuisioner
        $mainKuisioner->delete();
    
        // Redirect ke halaman index kuisioner atau lakukan sesuatu yang sesuai
        return redirect()->route('admin.kuisioner')->with('success', 'Main Kuisioner and related Kuisioners and HasilKuisioners deleted successfully.');
    }
    
}
