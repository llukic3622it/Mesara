<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaposleni extends Model
{
    use HasFactory;

    protected $table = 'zaposlenis';
    protected $primaryKey = 'ZaposleniID';

    protected $fillable = [
        'Ime',
        'Prezime',
        'PozicijaID',
    ];

    protected $casts = [
        'ZaposleniID' => 'integer',
        'PozicijaID' => 'integer',
    ];

    public function pozicija()
    {
        return $this->belongsTo(Pozicija::class, 'PozicijaID', 'PozicijaID');
    }

    public function porudzbine()
    {
        return $this->hasMany(Porudzbina::class, 'ZaposleniID', 'ZaposleniID');
    }
}
