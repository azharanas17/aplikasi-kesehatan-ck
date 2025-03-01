<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratKuasaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/surat-kuasa/cetak-pdf/{id}', [SuratKuasaController::class, 'generatePdf'])->name('filament.dashboard.resources.surat-kuasas.surat-kuasa.cetak-pdf');
