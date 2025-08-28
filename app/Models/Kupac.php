<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kupac extends Model
{
    use HasFactory;

    protected $table = 'kupacs';
    
    protected $fillable = [
        'ime',
        'prezime',
        'email',
        'telefon',
        'adresa',
        'user_id' // DODAJ OVO
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // DODAJ RELACIJU KA USERU
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // DODAJ ACCESSOR ZA PUNO IME (ako ti treba)
    public function getImePrezimeAttribute(): string
    {
        return $this->ime . ' ' . $this->prezime;
    }
}