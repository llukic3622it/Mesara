<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipProizvoda;
use App\Models\Proizvod; 

class TipProizvodaController extends Controller
{
    /**
     * Prikaz liste svih tipova proizvoda.
     */
    public function index()
    {
        $tipovi = TipProizvoda::all();
        return view('admin.tipovi_proizvoda.index', compact('tipovi'));
    }

    /**
     * Prikaz forme za kreiranje novog tipa proizvoda.
     */
    public function create()
    {
        return view('admin.tipovi_proizvoda.create');
    }

    /**
     * Čuvanje novog tipa proizvoda u bazi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TipProizvoda' => 'required|string|max:255|unique:tip_proizvodas,TipProizvoda', // AŽURIRANO
        ]);

        TipProizvoda::create($request->all());

        return redirect()->route('admin.tipovi_proizvoda.index')
                       ->with('success', 'Tip proizvoda je uspešno dodat.');
    }

    /**
     * Prikaz određenog tipa proizvoda.
     */
    public function show($id)
    {
        $tip = TipProizvoda::findOrFail($id);
        return view('admin.tipovi_proizvoda.show', compact('tip'));
    }

    /**
     * Prikaz forme za izmenu TIPA PROIZVODA.
     */
    public function edit($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        $tipoviProizvoda = TipProizvoda::all();
        
        return view('admin.proizvodi.edit', compact('proizvod', 'tipoviProizvoda'));
    }

    /**
     * Ažuriranje tipa proizvoda u bazi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'TipProizvoda' => 'required|string|max:255|unique:tip_proizvodas,TipProizvoda,' . $id . ',TipProizvodaID', // AŽURIRANO
        ]);

        $tip = TipProizvoda::findOrFail($id);
        $tip->update($request->all());

        return redirect()->route('admin.tipovi_proizvoda.index')
                       ->with('success', 'Tip proizvoda je uspešno ažuriran.');
    }

    /**
     * Brisanje tipa proizvoda iz baze.
     */
    public function destroy($id)
    {
        $tip = TipProizvoda::findOrFail($id);
        
        // Provera da li postoje proizvodi ovog tipa
        if ($tip->proizvodi()->count() > 0) {
            return redirect()->route('admin.tipovi_proizvoda.index')
                           ->with('error', 'Ne možete obrisati tip proizvoda jer postoje proizvodi ovog tipa.');
        }
        
        $tip->delete();

        return redirect()->route('admin.tipovi_proizvoda.index')
                       ->with('success', 'Tip proizvoda je uspešno obrisan.');
    }
}