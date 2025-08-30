<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;

class PocetnaController extends Controller
{
    public function index()
    {
        // Učitavamo sve proizvode iz baze
        $proizvodi = Proizvod::all();

        // 
        return view('pocetna', compact('proizvodi'));
    }
}
