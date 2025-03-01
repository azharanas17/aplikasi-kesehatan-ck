<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratKuasaController;
use App\Http\Controllers\RelawanController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/surat-kuasa/cetak-pdf/{id}', [SuratKuasaController::class, 'generatePdf'])->name('filament.dashboard.resources.surat-kuasas.surat-kuasa.cetak-pdf');
Route::get('/kartu-anggota/{id}', [RelawanController::class, 'generateKartu'])->name('filament.dashboard.resources.relawans.kartu-anggota');

