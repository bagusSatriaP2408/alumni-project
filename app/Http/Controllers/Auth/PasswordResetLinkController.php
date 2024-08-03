<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendUniqueCode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);
        
        $email = $request->email;
        $veremail=User::where('approved',1)->where('email',$email)->first();
        if (!$veremail) {
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar']);
        }
        $uniqueCode = rand(100000, 999999); 

        session(['unique_code' => $uniqueCode, 'email' => $email]);

        Mail::to($email)->send(new SendUniqueCode($uniqueCode));

        return redirect()->back()->with('emailSubmitted', true);
    }

    public function confirmCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric'
        ], [
            'code.required' => 'Kolom kode harus diisi.',
            'code.numeric' => 'Kolom kode harus berupa angka.',
        ]);

        $submittedCode = $request->code;
        $storedCode = session('unique_code');
        $email = session('email');

        if ($submittedCode == $storedCode) {
            session(['verified_email' => $email]);
            return redirect()->route('password.reset');  
        } else {
            return redirect()->back()->withErrors(['code' => 'Code yang anda masukkan salah']);
        }
    }

}
