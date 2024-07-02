<?php

namespace App\Http\Controllers;

use App\Models\MainKuisioner;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $main_kuisioner = MainKuisioner::all();
        return view('admin.tracking.index',compact('main_kuisioner'));
    }
    public function kuisioner($id)
    {
        $tracking=
        return view('admin.tracking.tracking_kuisioner',compact('tracking'));
    }
}
