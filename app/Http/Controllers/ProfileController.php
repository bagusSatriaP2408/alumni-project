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
use App\Models\JenisPekerjaan;
use App\Models\Vendor;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $pekerjaan = $request->user()->pekerjaan;
        $hasjob=False;
        $index=False;
        foreach ($pekerjaan as $item) {
            if ($item->done==0) {
                $hasjob = True;
                $index = $item->id;
            };
        }
        return view('profile.edit', [
            'user' => $request->user(),
            'jenis_pekerjaan' => JenisPekerjaan::all(),
            'vendors' => Vendor::all(),
            'index'=>$index,
            'hasjob'=>$hasjob,
            'pekerjaan'=>$pekerjaan
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
        $vendors = Vendor::all();
        // Kirim data pengguna ke view profile
        return view('profile', compact('user','pekerjaan','vendors'));
    }

    public function store_pekerjaan(Request $request): RedirectResponse
    {
        $user = $request->user();
        $mulaiBekerja = $request->input('mulai_bekerja');
        $jenis_pekerjaan = $request->jenis_pekerjaan_id;
        // $selesaiBekerja = $request->input('selesai_bekerja');

        // if ($mulaiBekerja > $selesaiBekerja) {
        //     return Redirect::route('profile.edit')->with('error', 'Selesai bekerja tidak boleh kurang dari mulai bekerja');
        // }

        // Pekerjaan::create([
        //     'user_id' => $user->id,
        //     // 'nama_pekerjaan' => $request->input('nama_pekerjaan'),
        //     'nama_perusahaan' => $request->input('nama_perusahaan'),
        //     'jenis_pekerjaan_id'=>$request->jenis_pekerjaan_id,
        //     'alamat_perusahaan' => $request->input('alamat_perusahaan'),
        //     'mulai_bekerja' => $mulaiBekerja,
        //     // 'selesai_bekerja' => $selesaiBekerja,
        //     'done'=>0
        // ]);

        if ($request->nama_perusahaan === 'new') {
            $vendor = Vendor::create([
                'nama_perusahaan' => $request->new_nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
            ]);
        } else {
            $vendor = Vendor::where('id', $request->nama_perusahaan)->first();
            if ($vendor) {
                $vendor->update([
                    'alamat_perusahaan' => $request->alamat_perusahaan,
                ]);
            }
        }

        if ($jenis_pekerjaan === 'new') {
            $type = $request->type;
            $jenis_pekerjaan = JenisPekerjaan::create([
                'nama_pekerjaan' => $request->new_jenis_pekerjaan,
                'type' => $type,
            ]);
            $jenis_pekerjaan = $jenis_pekerjaan->id_jenis_pekerjaan;
        } 

        Pekerjaan::create([
            'user_id' => $user->id,
            'vendor_id' => $vendor->id,
            'jenis_pekerjaan_id' => $jenis_pekerjaan,
            'mulai_bekerja' => $mulaiBekerja,
            'done' => 0
        ]);

        return Redirect::route('profile.edit')->with('status', 'pekerjaan-added');
    }

    public function update_pekerjaan(Request $request): RedirectResponse
    {
        $mulaiBekerja = $request->mulai_bekerja;
        $selesaiBekerja = $request->input('selesai_bekerja');

        if ($mulaiBekerja > $selesaiBekerja) {
            return Redirect::route('profile.edit')->with('error', 'Selesai bekerja tidak boleh kurang dari mulai bekerja');
        }

        Pekerjaan::find($request->index)
        ->update([
            'selesai_bekerja'=>$selesaiBekerja,
            'done'=>1
        ]);

        return Redirect::route('profile.edit')->with('status', 'pekerjaan-updated');
    }
    
}
