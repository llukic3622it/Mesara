<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipProizvoda extends Model
{
    use HasFactory;

    protected $table = 'tip_proizvodas';
    protected $primaryKey = 'TipProizvodaID';

    public $timestamps = false; // ako nema created_at, updated_at

    protected $fillable = [
        'TipProizvoda',
    ];

    protected $casts = [
        'TipProizvodaID' => 'integer',
    ];

    public function proizvodi()
    {
        return $this->hasMany(Proizvod::class, 'TipProizvodaID', 'TipProizvodaID');
    }

}

