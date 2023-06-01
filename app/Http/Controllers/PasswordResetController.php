<?php

// app/Http/Controllers/PasswordResetController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function showResetForm()
    {
        return view('resetpassword');
    }

    public function sendResetLink(Request $request)
    {
        $email = $request->input('email');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user) {
            // Envie o email de recuperação de senha
            Password::sendResetLink(['email' => $email]);

            return redirect()->back()->with('success', 'Email sent successfully.');
        } else {
            return redirect()->back()->with('error', 'Email does not exist in our records.');
        }
    }
}
