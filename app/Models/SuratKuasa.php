<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class SuratKuasa extends Model
{
    use HasFactory;

    protected $table = 'surat_kuasa';
    protected $fillable = [
        'nik_pemberi_kuasa', 
        'hubungan',
        'nik_pasien',
        'penyakit',
        'nik_penerima_kuasa_1',
        'nik_penerima_kuasa_2',
    ];

    public function pemberi_kuasa()
    {
        return $this->belongsTo(User::class, 'nik_pemberi_kuasa', 'nik');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'nik_pasien', 'nik');
    }

    public function penerima_kuasa_1()
    {
        return $this->belongsTo(User::class, 'nik_penerima_kuasa_1', 'nik');
    }

    public function penerima_kuasa_2()
    {
        return $this->belongsTo(User::class, 'nik_penerima_kuasa_2', 'nik');
    }
}
