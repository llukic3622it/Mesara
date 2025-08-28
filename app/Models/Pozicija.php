<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pozicija extends Model
{
    use HasFactory;

    protected $table = 'pozicijas';
    protected $primaryKey = 'PozicijaID';

    public $timestamps = false;

    protected $fillable = [
        'NazivPozicije',
    ];

    protected $casts = [
        'PozicijaID' => 'integer',
    ];

    public function zaposleni()
    {
        return $this->hasMany(Zaposleni::class, 'PozicijaID', 'PozicijaID');
    }
}
