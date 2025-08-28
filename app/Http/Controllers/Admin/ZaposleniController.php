<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zaposleni;
use App\Models\Pozicija;
use Illuminate\Http\Request;

class ZaposleniController extends Controller
{
    public function index()
    {
        $zaposleni = Zaposleni::with('pozicija')->paginate(10);
        return view('admin.zaposleni.index', compact('zaposleni'));
    }

    public function create()
    {
        $pozicije = Pozicija::all(); // Uzmite sve pozicije iz baze
        return view('admin.zaposleni.create', compact('pozicije'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'Ime' => 'required|string|max:255',
            'Prezime' => 'required|string|max:255',
            'PozicijaID' => 'required|exists:pozicijas,PozicijaID'
        ]);

        Zaposleni::create($request->all());

        return redirect()->route('admin.zaposleni.index')
            ->with('success', 'Zaposleni je uspešno dodat.');
    }

    public function show(Zaposleni $zaposleni)
    {
        return view('admin.zaposleni.show', compact('zaposleni'));
    }

    public function edit(Zaposleni $zaposleni)
    {
        $pozicije = Pozicija::all();
        return view('admin.zaposleni.edit', compact('zaposleni', 'pozicije'));
    }

    public function update(Request $request, Zaposleni $zaposleni)
    {
        $request->validate([
            'Ime' => 'required|string|max:255',
            'Prezime' => 'required|string|max:255',
            'PozicijaID' => 'required|exists:pozicijas,PozicijaID'
        ]);

        $zaposleni->update($request->all());

        return redirect()->route('admin.zaposleni.index')
            ->with('success', 'Podaci o zaposlenom su uspešno ažurirani.');
    }

    public function destroy(Zaposleni $zaposleni)
    {
        $zaposleni->delete();

        return redirect()->route('admin.zaposleni.index')
            ->with('success', 'Zaposleni je uspešno obrisan.');
    }
}