<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proizvod;
use App\Models\TipProizvoda;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    /**
     * Prikazuje listu svih proizvoda
     */
    public function index()
    {
        $proizvodi = Proizvod::with('tipProizvoda')->get();
        return view('admin.proizvodi.index', compact('proizvodi'));
    }

    /**
     * Prikazuje formu za kreiranje novog proizvoda
     */
    public function create()
    {
        $tipoviProizvoda = TipProizvoda::all();
        return view('admin.proizvodi.create', compact('tipoviProizvoda'));
    }

    /**
     * Čuva novi proizvod u bazi
     */
    public function store(Request $request)
    {
        $request->validate([
            'TipProizvodaID' => 'required|exists:tip_proizvodas,TipProizvodaID',
            'Naziv' => 'required|string|max:255',
            'Kolicina' => 'required|integer|min:0',
            'Status' => 'required|in:Dostupno,Nedostupno',
            'Cena' => 'required|numeric|min:0',
        ]);

        Proizvod::create($request->all());

        return redirect()->route('admin.proizvodi.index')
            ->with('success', 'Proizvod je uspešno kreiran.');
    }

    
    public function show($id)
    {
        $proizvod = Proizvod::with('tipProizvoda')->findOrFail($id);
        return view('admin.proizvodi.show', compact('proizvod'));
    }

    
    public function edit($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        $tipoviProizvoda = TipProizvoda::all();
        return view('admin.proizvodi.edit', compact('proizvod', 'tipoviProizvoda'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'TipProizvodaID' => 'required|exists:tip_proizvodas,TipProizvodaID',
            'Naziv' => 'required|string|max:255',
            'Kolicina' => 'required|integer|min:0',
            'Status' => 'required|in:Dostupno,Nedostupno',
            'Cena' => 'required|numeric|min:0',
        ]);

        $proizvod = Proizvod::findOrFail($id);
        $proizvod->update($request->all());

        return redirect()->route('admin.proizvodi.index')
            ->with('success', 'Proizvod je uspešno ažuriran.');
    }


    public function destroy($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        $proizvod->delete();

        return redirect()->route('admin.proizvodi.index')
            ->with('success', 'Proizvod je uspešno obrisan.');
    }
}