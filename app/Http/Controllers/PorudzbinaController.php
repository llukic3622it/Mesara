<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porudzbina extends Model
{
    use HasFactory;

    // VAŽNO: Proveri da li se tabela zaista zove 'porudzbinas'
    protected $table = 'porudzbinas';
    
    // VAŽNO: Proveri da li je primarni ključ zaista 'PorudzbinaID'
    protected $primaryKey = 'PorudzbinaID';
    
    public $timestamps = true;
    
    // VAŽNO: Proveri tačne nazive kolona u bazi
    protected $fillable = [
        'KupacID',
        'Datum_prijave', 
        'ZaposleniID',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'Datum_prijave' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}