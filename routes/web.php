<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratKuasaController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/surat-kuasa/cetak-pdf/{id}', [SuratKuasaController::class, 'generatePdf'])->name('filament.dashboard.resources.surat-kuasas.surat-kuasa.cetak-pdf');
Route::get('/kartu-anggota/{id}', [RelawanController::class, 'generateKartu'])->name('filament.dashboard.resources.relawans.kartu-anggota');
Route::get('/formulir-data-pasien/{id}', [PasienController::class, 'generatePdf'])->name('filament.dashboard.resources.pasiens.formulir-data-pasien');
Route::get('/formulir-data-siswa/{id}', [SiswaController::class, 'generatePdf'])->name('filament.dashboard.resources.siswas.formulir-data-siswa');

