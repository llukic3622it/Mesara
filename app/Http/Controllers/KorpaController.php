<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Kupac;
use App\Models\Proizvod;
use App\Models\Porudzbina;
use Illuminate\Support\Facades\Auth;

class KorpaController extends Controller
{
    // Prikaz korpe
    public function index()
    {
        $korpa = Session::get('korpa', []);
        $ukupno = 0;
        
        foreach($korpa as $item) {
            $ukupno += $item['cena'] * $item['kolicina'];
        }
        
        return view('korpa', compact('korpa', 'ukupno')); 
    }

    // Dodavanje proizvoda u korpu (AJAX)
    public function dodaj(Request $request)
    {
        $proizvodId = $request->input('id');
        $kolicina = $request->input('kolicina', 1);

        $proizvod = Proizvod::findOrFail($proizvodId);

        $korpa = session()->get('korpa', []);

        if(isset($korpa[$proizvodId])) {
            $korpa[$proizvodId]['kolicina'] += $kolicina;
        } else {
            $korpa[$proizvodId] = [
                'naziv' => $proizvod->Naziv,
                'cena' => $proizvod->Cena,
                'kolicina' => $kolicina,
                'slika' => $proizvod->slika ?? 'https://via.placeholder.com/100'
            ];
        }

        session()->put('korpa', $korpa);

        return response()->json([
            'success' => true,
            'korpa_count' => count($korpa),
            'message' => 'Proizvod dodat u korpu!'
        ]);
    }
    // Ažuriranje količine proizvoda u korpi
    public function azuriraj(Request $request, $id)
    {
        $korpa = Session::get('korpa', []);
        
        if(isset($korpa[$id]) && $request->has('kolicina')) {
            $korpa[$id]['kolicina'] = $request->kolicina;
            Session::put('korpa', $korpa);
        }

        return redirect()->back()->with('success', 'Količina ažurirana!');
    }

    // Uklanjanje proizvoda iz korpe
    public function ukloni($id)
    {
        $korpa = Session::get('korpa', []);
        
        if(isset($korpa[$id])) {
            unset($korpa[$id]);
            Session::put('korpa', $korpa);
        }

        return redirect()->back()->with('success', 'Proizvod uklonjen iz korpe!');
    }

    // Brisanje cele korpe
    public function obrisiSve()
    {
        Session::forget('korpa');
        return redirect()->back()->with('success', 'Korpa je obrisana!');
    }

    public function plati(Request $request)
    {
        $korpa = Session::get('korpa', []);

        if(empty($korpa)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Korpa je prazna!'
                ], 400);
            }
            return redirect()->back()->with('error', 'Korpa je prazna!');
        }

        if(!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Morate biti prijavljeni da biste platili.'
                ], 401);
            }
            return redirect()->route('login')->with('error', 'Morate biti prijavljeni da biste platili.');
        }

        $kupacId = Auth::id();

        $zaposleniId = 1; // default zaposleni
        $zaposleni = \App\Models\Zaposleni::find($zaposleniId);
        if(!$zaposleni) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Odabrani zaposleni ne postoji!'
                ], 400);
            }
            return redirect()->back()->with('error', 'Odabrani zaposleni ne postoji!');
        }

        try {
            $porudzbina = new Porudzbina();
            $porudzbina->KupacID = $kupacId;
            $porudzbina->Datum_prijave = now();
            $porudzbina->ZaposleniID = $zaposleni->ZaposleniID;
            $porudzbina->save();

            foreach($korpa as $id => $details) {
                $porudzbina->proizvodi()->attach($id, [
                    'kolicina' => $details['kolicina'],
                    'cena_po_komadu' => $details['cena']
                ]);
            }

            Session::forget('korpa');

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Porudžbina je uspešno kreirana!',
                    'redirect' => route('porudzbine')
                ]);
            }

            return redirect()->route('porudzbine')->with('success', 'Porudžbina je uspešno kreirana!');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Došlo je do greške prilikom kreiranja porudžbine: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Došlo je do greške prilikom kreiranja porudžbine: ' . $e->getMessage());
        }
    }

}