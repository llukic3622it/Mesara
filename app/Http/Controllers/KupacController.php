<?php

namespace App\Http\Controllers;

use App\Models\Kupac;
use Illuminate\Http\Request;

class KupacController extends Controller
{
    public function index()
    {
        $kupci = Kupac::orderBy('created_at', 'desc')->get();
        return view('kupci', compact('kupci'));
    }

    public function getKupac($id)
    {
        $kupac = Kupac::find($id);
        
        if (!$kupac) {
            return response()->json(['error' => 'Kupac nije pronađen'], 404);
        }
        
        return response()->json($kupac);
    }

    public function dodajKupca(Request $request)
        {
            $validatedData = $request->validate([
                'ime' => 'required|string|max:255',
                'prezime' => 'required|string|max:255',
                'email' => 'required|email|unique:kupacs,email',
                'telefon' => 'nullable|string|max:20',
                'adresa' => 'nullable|string|max:500'
            ]);

            try {
                $kupac = Kupac::create($validatedData);
                return response()->json([
                    'success' => true,
                    'message' => 'Kupac je uspešno dodat!',
                    'kupac' => $kupac
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Došlo je do greške prilikom dodavanja kupca: ' . $e->getMessage()
                ], 500);
            }
        }
}