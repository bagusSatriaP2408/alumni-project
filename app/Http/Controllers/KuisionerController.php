<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\MainKuisioner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KuisionerRequest;
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

    public function create(): View
    {
        $kuisioner = new Kuisioner();

        return view('kuisioner.create', compact('kuisioner'));
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kuisioner = Kuisioner::find($id);

        return view('kuisioner.edit', compact('kuisioner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KuisionerRequest $request, Kuisioner $kuisioner): RedirectResponse
    {
        $kuisioner->update($request->validated());

        return Redirect::route('kuisioner.index')
            ->with('success', 'Kuisioner updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Kuisioner::find($id)->delete();

        return Redirect::route('kuisioner.index')
            ->with('success', 'Kuisioner deleted successfully');
    }
}
