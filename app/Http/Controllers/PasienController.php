<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function generatePdf($id)
    {
        $data = Pasien::findOrFail($id);

        $pdf = Pdf::loadView('pdf.formulir-data-pasien', compact('data'))
                  ->setPaper('A4', 'portrait');

        return $pdf->stream('FormulirDataPasien - ' . $data->pasien->name . '.pdf');
    }
}
