<?php

namespace App\Http\Controllers;

use App\Models\MainKuisioner;
use Illuminate\Http\Request;
use App\Models\HasilKuisioner;
use App\Models\Kuisioner;
use App\Models\Main_hasil_kuisioner;
use App\Models\JenisPekerjaan;
use App\Models\Pekerjaan;


class TrackingController extends Controller
{
    public function index()
    {
        $jenisPekerjaan = JenisPekerjaan::all();
        $pekerjaan = Pekerjaan::all();
        $main_kuisioner = MainKuisioner::all();
        return view('admin.tracking.index',compact('main_kuisioner','jenisPekerjaan','pekerjaan'));
    }
    public function kuisioner($id)
    {
        $tracking = Main_hasil_kuisioner::with(['kuisioner', 'hasil_kuisioner'])
            ->whereHas('kuisioner', function($query) use ($id) {
                $query->where('id_main_kuisioner', $id);
            })
            ->get();

        $kuisioner=Kuisioner::where('id_main_kuisioner', $id)->get();
        $count=$kuisioner->count();

        $respondan = HasilKuisioner::with('kuisioner')
        ->whereHas('kuisioner', function($query) use ($id) {
            $query->where('id_main_kuisioner', $id);
        })->get();
        $count_respondan=$respondan->count();
        $count_respondan=$count_respondan/$count;
        return view('admin.tracking.tracking_kuisioner', compact('tracking','kuisioner','count_respondan',));
    
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

}