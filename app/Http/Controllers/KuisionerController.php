<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
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
    public function index(Request $request): View
    {
        $kuisioner = Kuisioner::paginate();

        return view('kuisioner.index', compact('kuisioner'))
            ->with('i', ($request->input('page', 1) - 1) * $kuisioner->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kuisioner = new Kuisioner();

        return view('kuisioner.create', compact('kuisioner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KuisionerRequest $request): RedirectResponse
    {
        Kuisioner::create($request->validated());

        return Redirect::route('kuisioner.index')
            ->with('success', 'Kuisioner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $kuisioner = Kuisioner::find($id);

        return view('kuisioner.show', compact('kuisioner'));
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
