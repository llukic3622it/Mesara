<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Porudzbina;
use App\Models\Kupac;
use App\Models\Proizvod;
use App\Models\Zaposleni;
use Illuminate\Http\Request;

class PorudzbinaController extends Controller
{
    /**
     * Prikazuje listu svih porudžbina.
     */
    public function index()
    {
        $porudzbine = Porudzbina::with(['kupac', 'zaposleni', 'proizvod'])->get();
        return view('admin.porudzbine.index', compact('porudzbine'));
    }

    /**
     * Prikazuje formu za kreiranje nove porudžbine.
     */
    public function create()
    {
        $kupci = Kupac::all();
        $zaposleni = Zaposleni::all();
        $proizvodi = Proizvod::all();
        
        return view('admin.porudzbine.create', compact('kupci', 'zaposleni', 'proizvodi'));
    }

    /**
     * Čuva novu porudžbinu u bazi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'KupacID' => 'required|integer|exists:kupacs,KupacID',
            'Datum_prijave' => 'required|date',
            'ZaposleniID' => 'required|integer|exists:zaposlenis,ZaposleniID',
            'proizvod_id' => 'nullable|integer|exists:proizvods,ProizvodID',
        ]);

        Porudzbina::create($request->all());

        return redirect()->route('admin.porudzbine.index')
            ->with('success', 'Porudžbina je uspešno dodata.');
    }

    /**
     * Prikazuje detalje o određenoj porudžbini.
     */
    public function show($id)
    {
        $porudzbina = Porudzbina::with(['kupac', 'zaposleni', 'proizvod'])->findOrFail($id);
        return view('admin.porudzbine.show', compact('porudzbina'));
    }

    /**
     * Prikazuje formu za izmenu porudžbine.
     */
    public function edit($id)
    {
        $porudzbina = Porudzbina::findOrFail($id);
        $kupci = Kupac::all();
        $zaposleni = Zaposleni::all();
        $proizvodi = Proizvod::all();
        
        return view('admin.porudzbine.edit', compact('porudzbina', 'kupci', 'zaposleni', 'proizvodi'));
    }

    /**
     * Ažurira porudžbinu u bazi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'KupacID' => 'required|integer|exists:kupacs,KupacID',
            'Datum_prijave' => 'required|date',
            'ZaposleniID' => 'required|integer|exists:zaposlenis,ZaposleniID',
            'proizvod_id' => 'nullable|integer|exists:proizvods,ProizvodID',
        ]);

        $porudzbina = Porudzbina::findOrFail($id);
        $porudzbina->update($request->all());

        return redirect()->route('admin.porudzbine.index')
            ->with('success', 'Porudžbina je uspešno ažurirana.');
    }

    /**
     * Briše porudžbinu iz baze.
     */
    public function destroy($id)
    {
        $porudzbina = Porudzbina::findOrFail($id);
        $porudzbina->delete();

        return redirect()->route('admin.porudzbine.index')
            ->with('success', 'Porudžbina je uspešno obrisana.');
    }
}