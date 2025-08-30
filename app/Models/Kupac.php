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
        'user_id' 
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
    public function getImePrezimeAttribute(): string
    {
        return $this->ime . ' ' . $this->prezime;
    }
}