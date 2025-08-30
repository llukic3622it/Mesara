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
        'proizvod_id', 
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'Datum_prijave' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class, 'proizvod_id', 'ProizvodID');
    }

    
    public function kupac()
    {
        return $this->belongsTo(Kupac::class, 'KupacID', 'KupacID');
    }

    /**
     * Relacija sa zaposlenim
     */
    public function zaposleni()
    {
        return $this->belongsTo(Zaposleni::class, 'ZaposleniID', 'ZaposleniID');
    }
}