<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;

class ProizvodController extends Controller
{
    public function index()
    {
        $proizvodi = Proizvod::all();
        return view('pocetna', compact('proizvodi'));
    }

    public function detalji($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        return view('proizvod_detalji', compact('proizvod'));
    }
}
