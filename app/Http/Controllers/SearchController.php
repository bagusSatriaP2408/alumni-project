<?php

namespace App\Http\Controllers;

use App\Models\JenisPekerjaan;
use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {

        $users = User::join('prodi', 'users.prodi', '=', 'prodi.id')
                ->select('users.*', 'prodi.name as prodi')
                ->get();
        // dd($users);
        $prodis = Prodi::all(); 
        $jenisPekerjaan = JenisPekerjaan::all(); 
                     
        return view('search', compact('users', 'prodis', 'jenisPekerjaan'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $tahun_masuk = $request->input('tahun_masuk');
        $prodi = $request->input('prodi');
        $pekerjaan = $request->input('pekerjaan');
        
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->join('pekerjaan', 'users.id', '=', 'pekerjaan.user_id')
            ->select('users.*', 'prodi.name as prodi')
            ->distinct()
            ->latest();
    
        if (!empty($search)) {
            $query->where('users.name', 'like', '%' . $search . '%');
        }
    
        if (!empty($tahun_masuk)) {
            $query->where('users.tahun_masuk', $tahun_masuk);
        }
    
        if (!empty($prodi)) {
            $query->where('prodi.id', 'like', '%' . $prodi . '%');
        }

        if (!empty($pekerjaan)) {
            $query->where('pekerjaan.jenis_pekerjaan_id', 'like', '%' . $pekerjaan . '%');
        }

        if (empty($search) && empty($tahun_masuk) && empty($prodi) && empty($pekerjaan)) {
            $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
                ->select('users.*', 'prodi.name as prodi');
        }
    
        $users = $query->get();
        $prodis = Prodi::all();
        $jenisPekerjaan = JenisPekerjaan::all(); 

        return view('search', compact('users', 'prodis', 'jenisPekerjaan'));
    }
}
