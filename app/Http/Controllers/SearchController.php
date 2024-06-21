<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $users = User::join('prodi', 'users.prodi', '=', 'prodi.id')
                     ->select('users.*', 'prodi.name as prodi')
                     ->get();
                     
        return view('search', compact('users'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $tahun_masuk = $request->input('tahun_masuk');
        $prodi = $request->input('prodi');
        
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
                     ->select('users.*', 'prodi.name as prodi');
    
        if (!empty($search)) {
            $query->where('users.name', 'like', '%' . $search . '%');
        }
    
        if (!empty($tahun_masuk)) {
            $query->where('users.tahun_masuk', $tahun_masuk);
        }
    
        if (!empty($prodi)) {
            $query->where('prodi.name', 'like', '%' . $prodi . '%');
        }
    
        $users = $query->get();
    
        return view('search', compact('users'));
    }
}
