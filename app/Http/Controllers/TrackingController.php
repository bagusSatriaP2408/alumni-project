<?php

namespace App\Http\Controllers;

use App\Models\JenisPekerjaan;
use App\Models\Pekerjaan;
use App\Models\MainKuisioner;
use Illuminate\Http\Request;

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
        // $tracking=
        // return view('admin.tracking.tracking_kuisioner',compact('tracking'));
    }

    public function pekerjaan($id){
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
