<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->except(['gambar']));
        if ($request->hasFile('gambar')) {
            if ($user->gambar) {
                Storage::delete($user->gambar);
            }
            $filePath = $request->file('gambar')->store('images/profiles');
            $user->gambar = $filePath;
        }
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    // public function update_pekerjaan(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function show($id)
    {
        $users = User::join('prodi', 'users.prodi', '=', 'prodi.id')
                        ->select('users.*', 'prodi.name as prodi')
                        ->get();    

        // Ambil data pengguna berdasarkan ID
        $user = $users->where('id', $id)->first();
        $pekerjaan = Pekerjaan::where('user_id', $id)->get();
        // Kirim data pengguna ke view profile
        return view('profile', compact('user','pekerjaan'));
    }

    public function store_pekerjaan(Request $request): RedirectResponse
    {
        $user = $request->user();
        $mulaiBekerja = $request->input('mulai_bekerja');
        $selesaiBekerja = $request->input('selesai_bekerja');

        if ($mulaiBekerja > $selesaiBekerja) {
            return Redirect::route('profile.edit')->with('error', 'Selesai bekerja tidak boleh kurang dari mulai bekerja');
        }

        Pekerjaan::create([
            'user_id' => $user->id,
            'nama_pekerjaan' => $request->input('nama_pekerjaan'),
            'alamat_perusahaan' => $request->input('alamat_perusahaan'),
            'mulai_bekerja' => $mulaiBekerja,
            'selesai_bekerja' => $selesaiBekerja,
        ]);

        return Redirect::route('profile.edit')->with('status', 'pekerjaan-added');
    }

    public function update_pekerjaan(Request $request): RedirectResponse
    {
        $user = $request->user();
        $pekerjaan = Pekerjaan::where('user_id', $user->id)->first();
        $mulaiBekerja = $request->input('mulai_bekerja');
        $selesaiBekerja = $request->input('selesai_bekerja');

        if ($mulaiBekerja > $selesaiBekerja) {
            return Redirect::route('profile.edit')->with('error', 'Selesai bekerja tidak boleh kurang dari mulai bekerja');
        }

        if ($pekerjaan) {
            $pekerjaan->name = $request->input('name');
            $pekerjaan->save();
        } else {
            Pekerjaan::create([
                'user_id' => $user->id,
                'nama_pekerjaan' => $request->input('nama_pekerjaan'),
                'alamat_perusahaan' => $request->input('alamat_perusahaan'),
                'mulai_bekerja' => $request->input('mulai_bekerja'),
                'selesai_bekerja' => $request->input('selesai_bekerja'),
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'pekerjaan-updated');
    }
    
}
