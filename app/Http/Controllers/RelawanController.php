<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Relawan;

class RelawanController extends Controller
{
    public function generateKartu($id)
    {
        $relawan = Relawan::findOrFail($id);
        // $pdf = Pdf::loadView('pdf.kartu_anggota', compact('relawan'));
        $pdf = Pdf::loadView('pdf.kartu_anggota', compact('relawan'))
                  ->setPaper([0, 0, 255, 160], 'portrait');
        // return $pdf->stream('KartuAnggota - ' . $relawan->no_anggota . '_' . $relawan->relawan->name . '.pdf'); 
        return view('pdf.kartu_anggota', compact('relawan'));
    }
}

