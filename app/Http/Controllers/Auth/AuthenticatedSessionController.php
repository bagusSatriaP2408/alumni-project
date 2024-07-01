<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('web-admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('email', auth()->guard('web-admin')->user()->email);
            return redirect()->route('admin.dashboard');
        }  elseif (auth()->guard('web')->attempt($credentials)) {
            $user = auth()->guard('web')->user();
            if ($user->approved) {
                $request->session()->regenerate();
                $request->session()->put('email', $user->email);
                return redirect()->route('home');
            } else {
                auth()->guard('web')->logout();
                return back()->withErrors([
                    'email' => 'Akun Anda belum disetujui.'
                ])->onlyInput('email');
            }
        } else {
            return back()->withErrors([
                'email' => 'Login Gagal'
            ])->onlyInput('email');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function destroy_admin(Request $request): RedirectResponse
    {
        auth()->guard('web-admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
