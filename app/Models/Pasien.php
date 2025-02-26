<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TempatPendampingan;
use App\Models\JenisLayanan;
use App\Models\User;
use App\Models\Relawan;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = [
        'nik_pasien', 
        'no_rm', 
        'nik_keluarga_pendamping',
        'rumah_sakit_id',
        'jenis_layanan_id',
        'tanggal_masuk',
        'jam_masuk',
        'rujukan_id',
        'diagnose',
        'status_jaminan',
        'poli',
        'ruangan',
        'keterangan',
        'nik_relawan_pendamping'
    ];

    public function rumah_sakit()
    {
        return $this->belongsTo(TempatPendampingan::class);
    }

    public function jenis_layanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }

    public function rujukan()
    {
        return $this->belongsTo(TempatPendampingan::class);
    }

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }

    public function keluarga_pendamping()
    {
        return $this->belongsTo(User::class);
    }

    public function relawan_pendamping()
    {
        return $this->belongsTo(Relawan::class, 'nik_relawan_pendamping', 'nik_relawan');
    }
}
