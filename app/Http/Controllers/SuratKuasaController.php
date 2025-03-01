<?php

namespace App\Http\Controllers;

use App\Models\SuratKuasa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pasien;

class SuratKuasaController extends Controller
{
    public function generatePdf($id)
    {
        $surat_kuasa = SuratKuasa::findOrFail($id);
        $pdf = Pdf::loadView('pdf.surat_kuasa', compact('surat_kuasa'));
        return $surat_kuasa->nik_penerima_kuasa_2 ? 
            $pdf->stream('Surat Kuasa - ' . $surat_kuasa->penerima_kuasa_1->relawan->name . ' - ' . $surat_kuasa->penerima_kuasa_2->relawan->name . '.pdf') :
            $pdf->stream('Surat Kuasa - ' . $surat_kuasa->penerima_kuasa_1->relawan->name . '.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKuasa $suratKuasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKuasa $suratKuasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKuasa $suratKuasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKuasa $suratKuasa)
    {
        //
    }
}
