<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function generatePdf($id)
    {
        $data = Siswa::findOrFail($id);

        $pdf = Pdf::loadView('pdf.formulir-data-siswa', compact('data'));
                //   ->setPaper('A4', 'portrait');

        return $pdf->stream('FormulirDataSiswa - ' . $data->siswa->name . '.pdf');
    }
}
