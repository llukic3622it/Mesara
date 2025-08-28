<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitanje extends Model
{
    use HasFactory;

    // Naziv tabele
    protected $table = 'pitanja';

    // Omogućite masovno dodeljivanje za sve kolone
    protected $guarded = [];

    // Ili eksplicitno navedite fillable polja
    // protected $fillable = [
    //     'user_id',
    //     'name', 
    //     'proizvod_id',
    //     'pitanje' // ili 'ptianje' ako je tako u bazi
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class);
    }
}