<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\MainKuisioner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KuisionerRequest;
use App\Models\HasilKuisioner;
use App\Models\Main_hasil_kuisioner;
use App\Models\User;
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
        'type' => 'required',
        'kuisioner' => 'required|array|min:1',
        'kuisioner.*' => 'required|string|max:255',
    ]);

    // Buat entry baru di tabel MainKuisioner
    $mainKuisioner = MainKuisioner::create([
        'subject' => $request->subject,
        'type'=>$request->type
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
        $kuisioner = Kuisioner::with('main_hasil_kuisioner')->where('id_main_kuisioner', $id)->get();
    if (!$kuisioner) {
        // Handle the case where the kuisioner is not found
        return redirect()->route('admin.kuisioner')->with('error', 'Kuisioner not found');
    }

    // Return the view with the found kuisioner
    return view('admin.kuisioner.info', compact('kuisioner'));
    }
    public function show_hasil($id)
    {
        // Ambil data hasil kuisioner beserta kuisioner dan user terkait menggunakan eager loading
        $hasilKuisioner = HasilKuisioner::with(['main_hasil_kuisioner', 'lulusan'])
            ->whereHas('kuisioner', function ($query) use ($id) {
                $query->where('id_main_kuisioner', $id);
            })->get();       
        // Cek jika hasil kuisioner tidak ditemukan
        if ($hasilKuisioner->isEmpty()) {
            return redirect()->route('admin.kuisioner')->with('error', 'Hasil Kuisioner not found');
        }
    
        // Return view dengan data dari ketiga tabel yang telah digabungkan
        return view('admin.kuisioner.hasil', compact('hasilKuisioner'));
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
    public function output($id)
    {
        $kuisioner = Kuisioner::where('id_main_kuisioner', $id)->get();
    if (!$kuisioner) {
        // Handle the case where the kuisioner is not found
        return redirect()->route('admin.kuisioner')->with('error', 'Kuisioner not found');
    }
    // Return the view with the found kuisioner
    return view('admin.kuisioner.output', compact('kuisioner'));
    }
    public function output_create($id,$id_main)
    {
        $kuisioner = Kuisioner::where('id_kuisioner', $id)->first();
        $main_kuisioner = MainKuisioner::where('id_main_kuisioner', $id_main)->first();
    if (!$kuisioner) {
        // Handle the case where the kuisioner is not found
        return redirect()->route('admin.kuisioner')->with('error', 'Kuisioner not found');
    }

    // Return the view with the found kuisioner
    return view('admin.kuisioner.output_create', compact('kuisioner','main_kuisioner'));
    }
    public function output_store(Request $request,$id_main)
    {
        $request->validate([
            'id_kuisioner'=>'required',
            'output' => 'required|array|min:1',
            'output.*' => 'required|string|max:255',
        ]);   
        // Buat entry baru di tabel MainKuisioner
        // $mainKuisioner = main_hasil_kuisioner::create([
        //     'subject' => $request->subject,
        // ]);
    
        // Ambil id_main_kuisioner yang baru saja dibuat
        // $id_main_kuisioner = $mainKuisioner->id_main_kuisioner;
    
        // Simpan kuisioner yang terkait dengan MainKuisioner baru
        foreach ($request->output as $item) {
            Main_hasil_kuisioner::create([
                'id_kuisioner' => $request->id_kuisioner,
                'inputan' => $item
            ]);
        }
    
        // Redirect ke halaman index kuisioner atau lakukan sesuatu yang sesuai
        return redirect()->route('admin.kuisioner.output',$id_main)->with('success', 'Kuisioner created successfully.');
    }
    public function output_edit($id,$id_main)
    {
        // Ambil data Kuisioner beserta data MainKuisioner yang terkait
        $output = Kuisioner::with('main_hasil_kuisioner')->find($id);
        $main_kuisioner = MainKuisioner::where('id_main_kuisioner', $id_main)->first();
        // Jika $output tidak ditemukan, bisa ditangani sesuai kebutuhan
        if (!$output) {
            // Lakukan redirect atau tindakan lain
            return redirect()->back()->with('error', 'output not found.');
        };
        return view('admin.kuisioner.output_edit', compact('output','main_kuisioner'));
    }
    public function output_edit_store(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'output' => 'required|array|min:1',
            'output.*' => 'required|string|max:255',
        ]);
    
        // Get all records that match the 'kuisioner' id
        $records = Main_hasil_kuisioner::where('id_kuisioner', $id)->get();
    
        // Ensure there are enough records to update
        if ($records->count() < count($request->output)) {
            return redirect()->route('admin.kuisioner.edit', ['id' => $id])->with('error', 'Not enough records to update.');
        }
    
        // Loop through the output array and update each corresponding record
        foreach ($request->output as $index => $item) {
            if (isset($records[$index])) {
                $records[$index]->update(['inputan' => $item]);
            }
        }
    
        // Redirect to the edit questionnaire page with a success message
        return redirect()->route('admin.kuisioner.edit', ['id' => $id])->with('success', 'Kuisioner updated successfully.');
    }
    
    
    
}
