<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\KupacController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ZaposleniController;
use App\Http\Controllers\Admin\PorudzbinaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KorpaController;

// 📌 Početna
Route::get('/', [ProizvodController::class, 'index'])->name('proizvodi.index');
Route::get('/proizvod/{id}', [ProizvodController::class, 'detalji'])->name('proizvod.detalji');

// 📌 Kupci
Route::get('/kupci', [KupacController::class, 'index']);
Route::get('/get-kupac/{id}', [KupacController::class, 'getKupac']);
Route::post('/dodaj-kupca', [KupacController::class, 'dodajKupca']);

// 📌 Admin dashboard (zaštićen login-om)
Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('auth');

// 📌 Admin rute (sve pod /admin, samo za ulogovane)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Proizvodi
    Route::get('proizvodi', [App\Http\Controllers\Admin\ProizvodController::class, 'index'])->name('proizvodi.index');
    Route::get('proizvodi/create', [App\Http\Controllers\Admin\ProizvodController::class, 'create'])->name('proizvodi.create');
    Route::post('proizvodi', [App\Http\Controllers\Admin\ProizvodController::class, 'store'])->name('proizvodi.store');
    Route::get('proizvodi/{id}', [App\Http\Controllers\Admin\ProizvodController::class, 'show'])->name('proizvodi.show');
    Route::get('proizvodi/{id}/edit', [App\Http\Controllers\Admin\ProizvodController::class, 'edit'])->name('proizvodi.edit');
    Route::put('proizvodi/{id}', [App\Http\Controllers\Admin\ProizvodController::class, 'update'])->name('proizvodi.update');
    Route::delete('proizvodi/{id}', [App\Http\Controllers\Admin\ProizvodController::class, 'destroy'])->name('proizvodi.destroy');

    // Zaposleni
    Route::get('zaposleni', [ZaposleniController::class, 'index'])->name('zaposleni.index');
    Route::get('zaposleni/create', [ZaposleniController::class, 'create'])->name('zaposleni.create');
    Route::post('zaposleni', [ZaposleniController::class, 'store'])->name('zaposleni.store');
    Route::get('zaposleni/{zaposleni}', [ZaposleniController::class, 'show'])->name('zaposleni.show');
    Route::get('zaposleni/{zaposleni}/edit', [ZaposleniController::class, 'edit'])->name('zaposleni.edit');
    Route::put('zaposleni/{zaposleni}', [ZaposleniController::class, 'update'])->name('zaposleni.update');
    Route::delete('zaposleni/{zaposleni}', [ZaposleniController::class, 'destroy'])->name('zaposleni.destroy');

    // Porudžbine
    Route::get('porudzbine', [PorudzbinaController::class, 'index'])->name('porudzbine.index');
    Route::get('porudzbine/create', [PorudzbinaController::class, 'create'])->name('porudzbine.create');
    Route::post('porudzbine', [PorudzbinaController::class, 'store'])->name('porudzbine.store');
    Route::get('porudzbine/{id}', [PorudzbinaController::class, 'show'])->name('porudzbine.show');
    Route::get('porudzbine/{id}/edit', [PorudzbinaController::class, 'edit'])->name('porudzbine.edit');
    Route::put('porudzbine/{id}', [PorudzbinaController::class, 'update'])->name('porudzbine.update');
    Route::delete('porudzbine/{id}', [PorudzbinaController::class, 'destroy'])->name('porudzbine.destroy');
});

// 📌 Login rute
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



// Korpa rute
Route::get('/korpa', [KorpaController::class, 'index'])->name('korpa');
Route::post('/korpa/dodaj', [KorpaController::class, 'dodaj'])->name('korpa.dodaj');
Route::post('/korpa/azuriraj/{id}', [KorpaController::class, 'azuriraj'])->name('korpa.azuriraj');
Route::delete('/korpa/ukloni/{id}', [KorpaController::class, 'ukloni'])->name('korpa.ukloni');
Route::post('/korpa/obrisi-sve', [KorpaController::class, 'obrisiSve'])->name('korpa.obrisiSve');
Route::post('/korpa/plati', [KorpaController::class, 'plati'])->name('korpa.plati');

// Proizvodi rute (ako već nemate)
Route::get('/proizvodi', [ProizvodController::class, 'index'])->name('proizvodi');
Route::get('/proizvod/{id}', [ProizvodController::class, 'show'])->name('proizvod.detalji');


use App\Http\Controllers\PitanjeController;

Route::get('/pitanja/create', [PitanjeController::class, 'create'])->name('pitanja.create');
Route::post('/pitanja', [PitanjeController::class, 'store'])->name('pitanja.store');