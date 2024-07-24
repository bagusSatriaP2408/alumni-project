<?php
namespace App\Http\Controllers;

use App\Models\JenisPekerjaan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\User;

class Tracking_angkatan extends Controller
{
    public function index()
    {
        // Retrieve distinct tahun_masuk values and sort them in ascending order
        $angkatan = User::select('tahun_masuk')->distinct()->orderBy('tahun_masuk', 'asc')->pluck('tahun_masuk');
        return view('admin.tracking.angkatan.index', ['angkatan' => $angkatan]);
    }    
    public function show(Request $request)
    {
        // Validate the input
        $request->validate([
            'tahun_masuk' => 'required',
        ]);
    
        // Get all job types
        $jenisPekerjaan = JenisPekerjaan::all();
    
        // Get jobs related to the year entered
        $pekerjaan = Pekerjaan::whereHas('pekerjaan', function ($query) use ($request) {
            $query->where('tahun_masuk', $request->tahun_masuk);
        })->get();
    
        // Get users related to the year entered
        $user = User::where('tahun_masuk', $request->tahun_masuk)->where('approved',1)->get();
        $lulusan = $user->count();
        $count_pekerjaan = $pekerjaan->count();
        $not_work = $lulusan - $count_pekerjaan;
    
        // Prepare data for the pie chart
        $labels = $jenisPekerjaan->pluck('nama_pekerjaan');
        $dataCounts = $jenisPekerjaan->map(function ($jp) use ($pekerjaan) {
            return $pekerjaan->where('jenis_pekerjaan_id', $jp->id_jenis_pekerjaan)->count();
        });
    
        // Calculate percentages for the first chart
        $total = $dataCounts->sum();
        $dataPercentages = $dataCounts->map(function ($count) use ($total) {
            return $total > 0 ? ($count / $total) * 100 : 0; // Avoid division by zero
        });
    
        // Prepare for the second chart using a different field
        $dataCounts_2 = $jenisPekerjaan->map(function ($jpn) use ($pekerjaan) {
            return $pekerjaan->where('type', $jpn->type)->count(); // Corrected to match id
        });
    
        // Calculate percentages for the second chart
        $dataPercentages_2 = $dataCounts_2->map(function ($count) use ($total) {
            return $total > 0 ? ($count / $total) * 100 : 0; // Avoid division by zero
        });

        // Return the view with the prepared data
        return view('admin.tracking.angkatan.track', compact(
            'jenisPekerjaan', 'pekerjaan', 'lulusan', 'not_work',
            'labels', 'dataCounts', 'dataPercentages','dataCounts_2', 'dataPercentages_2'
        ));
    }
    public function show_multi(Request $request)
    {
        // Validate the input
        $request->validate([
            'tahun_masuk_awal' => 'required',
            'tahun_masuk_akhir' => 'required',
        ]);
    
        // Get all job types
        $jenisPekerjaan = JenisPekerjaan::all();
    
        // Get jobs related to the year entered
        $pekerjaan = Pekerjaan::whereHas('pekerjaan', function ($query) use ($request) {
            $query->whereBetween('tahun_masuk', [$request->tahun_masuk_awal, $request->tahun_masuk_akhir]);
        })->get();
    
        // Get users related to the year entered
        $user = User::whereBetween('tahun_masuk', [$request->tahun_masuk_awal, $request->tahun_masuk_akhir])->where('approved',1)->get();
        $lulusan = $user->count();
        $count_pekerjaan = $pekerjaan->count();
        $not_work = $lulusan - $count_pekerjaan;
    
        // Prepare data for the pie chart
        $labels = $jenisPekerjaan->pluck('nama_pekerjaan');
        $dataCounts = $jenisPekerjaan->map(function ($jp) use ($pekerjaan) {
            return $pekerjaan->where('jenis_pekerjaan_id', $jp->id_jenis_pekerjaan)->count();
        });
    
        // Calculate percentages for the first chart
        $total = $dataCounts->sum();
        $dataPercentages = $dataCounts->map(function ($count) use ($total) {
            return $total > 0 ? ($count / $total) * 100 : 0; // Avoid division by zero
        });
    
        // Prepare for the second chart using a different field
        $dataCounts_2 = $jenisPekerjaan->map(function ($jpn) use ($pekerjaan) {
            return $pekerjaan->where('type', $jpn->type)->count(); // Corrected to match id
        });
    
        // Calculate percentages for the second chart
        $dataPercentages_2 = $dataCounts_2->map(function ($count) use ($total) {
            return $total > 0 ? ($count / $total) * 100 : 0; // Avoid division by zero
        });

        // Return the view with the prepared data
        return view('admin.tracking.angkatan.track', compact(
            'jenisPekerjaan', 'pekerjaan', 'lulusan', 'not_work',
            'labels', 'dataCounts', 'dataPercentages','dataCounts_2', 'dataPercentages_2'
        ));
    }
    
    
    
    
}
