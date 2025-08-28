<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Prikaz forme za registraciju
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Obrada registracije
    public function register(Request $request)
    {
        // Validacija polja
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // mora imati password_confirmation
        ]);

        // Kreiranje korisnika
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirekcija na login stranu sa porukom
        return redirect()->route('login')->with('success', 'Registracija je uspešna! Možete se prijaviti.');
    }
}
