<?php

namespace App\Http\Controllers;

use App\Models\Zaposleni;
use Illuminate\Http\Request;

class ZaposleniController extends Controller
{
    /**
     * Prikazuje listu svih zaposlenih.
     */
    public function index()
    {
        $zaposleni = Zaposleni::all();
        return view('admin.zaposleni.index', compact('zaposleni'));
    }

    /**
     * Prikazuje formu za kreiranje novog zaposlenog.
     */
    public function create()
    {
        return view('admin.zaposleni.create');
    }

    /**
     * Čuva novog zaposlenog u bazi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Ime' => 'required|string|max:255',
            'Prezime' => 'required|string|max:255',
            'PozicijaID' => 'required|integer',
        ]);

        Zaposleni::create($request->all());

        return redirect()->route('admin.zaposleni.index')
            ->with('success', 'Zaposleni je uspešno dodat.');
    }

    /**
     * Prikazuje detalje o određenom zaposlenom.
     */
    public function show($id)
    {
        $zaposleni = Zaposleni::findOrFail($id);
        return view('admin.zaposleni.show', compact('zaposleni'));
    }

    /**
     * Prikazuje formu za izmenu zaposlenog.
     */
    public function edit($id)
    {
        $zaposleni = Zaposleni::findOrFail($id);
        return view('admin.zaposleni.edit', compact('zaposleni'));
    }

    /**
     * Ažurira zaposlenog u bazi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Ime' => 'required|string|max:255',
            'Prezime' => 'required|string|max:255',
            'PozicijaID' => 'required|integer',
        ]);

        $zaposleni = Zaposleni::findOrFail($id);
        $zaposleni->update($request->all());

        return redirect()->route('admin.zaposleni.index')
            ->with('success', 'Zaposleni je uspešno ažuriran.');
    }

    /**
     * Briše zaposlenog iz baze.
     */
    public function destroy($id)
    {
        $zaposleni = Zaposleni::findOrFail($id);
        $zaposleni->delete();

        return redirect()->route('admin.zaposleni.index')
            ->with('success', 'Zaposleni je uspešno obrisan.');
    }
}