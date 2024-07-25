<?php

namespace App\Http\Controllers;

use App\Models\HasilKuisionerVendor;
use App\Models\MainKuisioner;
use Illuminate\Http\Request;
use App\Models\HasilKuisioner;
use App\Models\Kuisioner;
use App\Models\Main_hasil_kuisioner;
use App\Models\JenisPekerjaan;
use App\Models\Pekerjaan;
use App\Models\Prodi;
use App\Models\User;

class TrackingController extends Controller
{
    public function index()
    {
        $jenisPekerjaan = JenisPekerjaan::all();
        $pekerjaan = Pekerjaan::all();
        $main_kuisioner = MainKuisioner::all();
        $lulusan=User::where('approved',1);
        $lulusan=$lulusan->count();
        $count_pekerjaan=$pekerjaan->count();
        $not_work=$lulusan-$count_pekerjaan;
        return view('admin.tracking.index',compact('main_kuisioner','jenisPekerjaan','pekerjaan','lulusan','not_work'));
    }
    public function kuisioner($id)
    {
        $type = MainKuisioner::where('id_main_kuisioner',$id)->get()[0]->type;

        if ($type === 'alumni') {
            $tracking = Main_hasil_kuisioner::with(['kuisioner', 'hasil_kuisioner'])
                ->whereHas('kuisioner', fn($query) => $query->where('id_main_kuisioner', $id))
                ->get();
            $respondan = HasilKuisioner::with('kuisioner')
                ->whereHas('kuisioner', fn($query) => $query->where('id_main_kuisioner', $id))
                ->get();
        } elseif ($type === 'vendor') {
            $tracking = Main_hasil_kuisioner::with(['kuisioner', 'hasil_kuisioner_vendor'])
                ->whereHas('kuisioner', fn($query) => $query->where('id_main_kuisioner', $id))
                ->get();
            $respondan = HasilKuisionerVendor::with('kuisioner')
                ->whereHas('kuisioner', fn($query) => $query->where('id_main_kuisioner', $id))
                ->get();
        }

        $kuisioner=Kuisioner::where('id_main_kuisioner', $id)->get();
        $count=$kuisioner->count();
        
        $count_respondan=$respondan->count()/$count;

        return view('admin.tracking.tracking_kuisioner', compact('tracking','kuisioner','count_respondan','type'));
    
}

public function pekerjaan($id)
{
    $jenis = JenisPekerjaan::find($id);
    $pekerjaan = Pekerjaan::all();
    $temp = [];
    foreach ($pekerjaan as $item) {
        if ($item->jenis_pekerjaan_id==$jenis->id_jenis_pekerjaan) {
            $temp[]=$item;
        };
    }
    return view('admin.tracking.pekerjaanInfo',compact('temp','jenis'));
}
public function search_page()
{

    $users = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->select('users.*', 'prodi.name as prodi')
            ->where('approved',1)->get();
    // dd($users);
    $prodis = Prodi::all(); 
    $jenisPekerjaan = JenisPekerjaan::all(); 
                 
    return view('admin.tracking.jumlah_lulusan', compact('users', 'prodis', 'jenisPekerjaan'));
}
public function not_work()
{

    $users = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->select('users.*', 'prodi.name as prodi')->whereDoesntHave('pekerjaan')
            ->where('approved',1)->get();
    $prodis = Prodi::all(); 
    $jenisPekerjaan = JenisPekerjaan::all();             
    return view('admin.tracking.not_work', compact('users', 'prodis', 'jenisPekerjaan'));
}
public function work()
{

    $users = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->select('users.*', 'prodi.name as prodi')->wherehas('pekerjaan')
            ->get();
    $prodis = Prodi::all(); 
    $jenisPekerjaan = JenisPekerjaan::all();             
    return view('admin.tracking.work', compact('users', 'prodis', 'jenisPekerjaan'));
}
public function search(Request $request)
{
    $search = $request->input('search');
    $tahun_masuk = $request->input('tahun_masuk');
    $prodi = $request->input('prodi');
    $pekerjaan = $request->input('pekerjaan');
    
    $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
        ->select('users.*', 'prodi.name as prodi');

    if (!empty($search)) {
        $query->where('users.name', 'like', '%' . $search . '%');
    }

    if (!empty($tahun_masuk)) {
        $query->where('users.tahun_masuk', 'like', '%' . $tahun_masuk . '%');
    }

    if (!empty($prodi)) {
        $query->where('prodi.id', 'like', '%' . $prodi . '%');
    }

    if (!empty($pekerjaan)) {
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
        ->join('pekerjaan', 'users.id', '=', 'pekerjaan.user_id')
        ->select('users.*', 'prodi.name as prodi')
        ->distinct()
        ->latest();
        $query->where('pekerjaan.jenis_pekerjaan_id', 'like', '%' . $pekerjaan . '%');
    }

    if (empty($search) && empty($tahun_masuk) && empty($prodi) && empty($pekerjaan)) {
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->select('users.*', 'prodi.name as prodi');
    }

    $users = $query->get();
    $prodis = Prodi::all();
    $jenisPekerjaan = JenisPekerjaan::all(); 

    return view('admin.tracking.jumlah_lulusan', compact('users', 'prodis', 'jenisPekerjaan'));
}

public function work_search(Request $request)
{
    $search = $request->input('search');
    $tahun_masuk = $request->input('tahun_masuk');
    $prodi = $request->input('prodi');
    $pekerjaan = $request->input('pekerjaan');
    
    $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
        ->select('users.*', 'prodi.name as prodi')->wherehas('pekerjaan');

    if (!empty($search)) {
        $query->where('users.name', 'like', '%' . $search . '%');
    }

    if (!empty($tahun_masuk)) {
        $query->where('users.tahun_masuk', 'like', '%' . $tahun_masuk . '%');
    }

    if (!empty($prodi)) {
        $query->where('prodi.id', 'like', '%' . $prodi . '%');
    }

    if (!empty($pekerjaan)) {
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
        ->join('pekerjaan', 'users.id', '=', 'pekerjaan.user_id')
        ->select('users.*', 'prodi.name as prodi')->wherehas('pekerjaan')
        ->distinct()
        ->latest();
        $query->where('pekerjaan.jenis_pekerjaan_id', 'like', '%' . $pekerjaan . '%');
    }

    if (empty($search) && empty($tahun_masuk) && empty($prodi) && empty($pekerjaan)) {
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->select('users.*', 'prodi.name as prodi')->wherehas('pekerjaan');
    }

    $users = $query->get();
    $prodis = Prodi::all();
    $jenisPekerjaan = JenisPekerjaan::all(); 

    return view('admin.tracking.work', compact('users', 'prodis', 'jenisPekerjaan'));
}
public function not_work_search(Request $request)
{
    $search = $request->input('search');
    $tahun_masuk = $request->input('tahun_masuk');
    $prodi = $request->input('prodi');
    $pekerjaan = $request->input('pekerjaan');
    
    $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
        ->select('users.*', 'prodi.name as prodi')->whereDoesntHave('pekerjaan');

    if (!empty($search)) {
        $query->where('users.name', 'like', '%' . $search . '%');
    }

    if (!empty($tahun_masuk)) {
        $query->where('users.tahun_masuk', 'like', '%' . $tahun_masuk . '%');
    }

    if (!empty($prodi)) {
        $query->where('prodi.id', 'like', '%' . $prodi . '%');
    }

    if (!empty($pekerjaan)) {
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
        ->join('pekerjaan', 'users.id', '=', 'pekerjaan.user_id')
        ->select('users.*', 'prodi.name as prodi')->whereDoesntHave('pekerjaan')
        ->distinct()
        ->latest();
        $query->where('pekerjaan.jenis_pekerjaan_id', 'like', '%' . $pekerjaan . '%');
    }

    if (empty($search) && empty($tahun_masuk) && empty($prodi) && empty($pekerjaan)) {
        $query = User::join('prodi', 'users.prodi', '=', 'prodi.id')
            ->select('users.*', 'prodi.name as prodi')->whereDoesntHave('pekerjaan');
    }

    $users = $query->get();
    $prodis = Prodi::all();
    $jenisPekerjaan = JenisPekerjaan::all(); 

    return view('admin.tracking.not_work', compact('users', 'prodis', 'jenisPekerjaan'));
}

}