<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the admin lulusan page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('admin.lulusan'); // Ensure you have a view file named 'admin/lulusan.blade.php'
    }
}
