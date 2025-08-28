<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Provera da li je korisnik admin
            if (Auth::user()->is_admin) {  // pretpostavimo da u users tabeli imaš kolonu 'is_admin'
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('proizvodi.index'); // obični korisnik ide na početnu
            }
        }

        return back()->withErrors([
            'email' => 'Pogrešni podaci za prijavu.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // odjavljuje korisnika
        $request->session()->invalidate(); // poništava sesiju
        $request->session()->regenerateToken(); // regeneriše CSRF token

        return redirect('/'); // vraća na početnu stranu
    }
}
