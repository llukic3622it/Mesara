<?php

namespace App\Http\Controllers;

use App\Models\Pitanje;
use App\Models\User;
use App\Models\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PitanjeController extends Controller
{
    public function create()
    {
        $users = User::all();
        $proizvodi = Proizvod::all();
        
        return view('pitanja.create', compact('users', 'proizvodi'));
    }

    public function store(Request $request)
    {
        // Validacija podataka iz forme
        $validated = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'ProizvodID' => 'required|exists:proizvods,ProizvodID', // 
            'pitanje'    => 'required|string|max:255',
        ]);

        try {
            // Dohvati korisnika
            $user = User::findOrFail($request->user_id);

            // Unos u tabelu pitanja
            DB::table('pitanja')->insert([
                'user_id'     => $request->user_id,
                'name'        => $user->name,
                'proizvod_id' => $request->ProizvodID,   // 
                'pitanje'     => $request->pitanje,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            return redirect()->back()->with('success', 'Pitanje je uspešno dodato!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Došlo je do greške: ' . $e->getMessage());
        }
    }
}
