<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porudzbina extends Model
{
    use HasFactory;

    
    protected $table = 'porudzbinas';
    
    
    protected $primaryKey = 'PorudzbinaID';
    
    public $timestamps = true;
    
    
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