<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;

    protected $table = 'proizvods';
    protected $primaryKey = 'ProizvodID';

    protected $fillable = [
        'TipProizvodaID',
        'Naziv',
        'Kolicina',
        'Status',
        'Cena',
    ];

    protected $casts = [
        'ProizvodID' => 'integer',
        'TipProizvodaID' => 'integer',
        'Kolicina' => 'integer',
        'Cena' => 'decimal:2',
    ];

    /**
     * Relacija sa tipom proizvoda
     */
    public function tipProizvoda()
    {
        return $this->belongsTo(TipProizvoda::class, 'TipProizvodaID', 'TipProizvodaID');
    }

    /**
     * Relacija sa porudzbinama
     */
    public function porudzbine()
    {
        return $this->hasMany(Porudzbina::class, 'proizvod_id', 'ProizvodID');
    }
}