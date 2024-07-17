<?php

namespace App\Http\Controllers;

use App\Models\JenisPekerjaan;
use App\Http\Requests\StoreJenisPekerjaanRequest;
use App\Http\Requests\UpdateJenisPekerjaanRequest;

class JenisPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaans = JenisPekerjaan::all();
        return view('admin.jenis-pekerjaan.index', compact('pekerjaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis-pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisPekerjaanRequest $request)
    {
        $validatedData = $request->validate([
            'nama_pekerjaan' => 'required|string|max:255', 
            'type' => 'required'
        ]);
    
        $jenisPekerjaan = new JenisPekerjaan();
        $jenisPekerjaan->nama_pekerjaan = $validatedData['nama_pekerjaan'];
        $jenisPekerjaan->type = $validatedData['type'];
        $jenisPekerjaan->save();
    
        return redirect()->route('jenis-pekerjaan.index')->with('success', 'Jenis Pekerjaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPekerjaan $jenisPekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jobType = JenisPekerjaan::findOrFail($id);
        return view('admin.jenis-pekerjaan.edit', compact('jobType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisPekerjaanRequest $request, $id)
    {
        $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
        ]);

        $jobType = JenisPekerjaan::findOrFail($id);
        $jobType->nama_pekerjaan = $request->nama_pekerjaan;
        $jobType->save();

        return redirect()->route('jenis-pekerjaan.index')
                            ->with('success', 'Jenis Pekerjaan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPekerjaan $jenisPekerjaan)
    {
        $jenisPekerjaan->delete();
        return redirect()->route('jenis-pekerjaan.index')->with('success', 'Jenis Pekerjaan berhasil dihapus!');
    }
}
