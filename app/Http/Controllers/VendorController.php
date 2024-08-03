<?php

namespace App\Http\Controllers;

use App\Models\HasilKuisionerVendor;
use App\Models\vendor;
use App\Models\Kuisioner;
use App\Mail\SendUniqueCode;
use Illuminate\Http\Request;
use App\Models\MainKuisioner;
use App\Models\HasilKuisioner;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::limit(6)->get();
        return view('vendor.index', compact('vendors'));
    }

    public function daftar_vendor()
    {
        $vendors = Vendor::all();
        return view('vendor.daftar-vendor', compact('vendors'));
    }

    public function verifikasi()
    {
        return view('vendor.verifikasi');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $otp = rand(100000, 999999); // Generate a random 6-digit OTP

        // Store OTP in session for verification
        Session::put('otp', $otp);

        // Send OTP to the user's email
        Mail::to($request->email)->send(new SendUniqueCode($otp));

        return back()->with('success', 'Kode OTP telah dikirim ke email Anda.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $otp = Session::get('otp');

        if ($request->otp == $otp) {
            // OTP is correct
            Session::forget('otp'); // Clear OTP from session
            return redirect()->route('vendor.daftar-kuisioner');
        } else {
            // OTP is incorrect
            return back()->with('error', 'Kode OTP salah.');
        }
    }

    public function daftar_kuisioner()
    {
        $vendors = MainKuisioner::where('type', 'vendor')->get();
        return view('vendor.daftar-kuisioner', compact('vendors'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
            'email_perusahaan' => 'required|email',
            'id_kuisioner' => 'required|array',
            'jawaban' => 'required|array',
        ]);

        // Check if the selected company is "new"
        if ($request->nama_perusahaan === 'new') {
            // Insert new company into vendors table
            $vendor = Vendor::create([
                'nama_perusahaan' => $request->new_nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'email_perusahaan' => $request->email_perusahaan,
            ]);
        } else {
            // Update existing company's email and address
            $vendor = Vendor::where('nama_perusahaan', $request->nama_perusahaan)->first();
            if ($vendor) {
                $vendor->update([
                    'alamat_perusahaan' => $request->alamat_perusahaan,
                    'email_perusahaan' => $request->email_perusahaan,
                ]);
            }
        }

        // Loop through submitted data and save to HasilKuisioner
        foreach ($request->id_kuisioner as $key => $id_kuisioner) {
            HasilKuisionerVendor::create([
                'id_kuisioner' => $id_kuisioner,
                'id_main_hasil_kuisioner' => $request->jawaban[$key],
                'vendor_id' => $vendor->id,
                // Add other fields as needed
            ]);
        }

        // Redirect or respond as needed
        return redirect()->route('vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kuisioner = Kuisioner::with(['main_hasil_kuisioner','mainKuisioner'])->where('id_main_kuisioner', $id)->get();
        // Cek jika kuisioner tidak ditemukan
        if ($kuisioner->isEmpty()) {
            return redirect()->route('kuisioner')->with('error', 'Kuisioner not found');
        }

        $vendors = Vendor::all();
        return view('vendor.show', compact('kuisioner', 'vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vendor $vendor)
    {
        //
    }
}
