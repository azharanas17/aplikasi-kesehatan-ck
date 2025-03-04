<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\TempatPendampingan;
use App\Models\PersoalanPendidikan;
use App\Models\Relawan;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'nik_siswa',
        'nik_wali',
        'sekolah_id',
        'jurusan',
        'persoalan_pendidikan_id',
        'nik_relawan_pendamping',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'nik_siswa', 'nik');
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'nik_wali', 'nik');
    }

    public function sekolah()
    {
        return $this->belongsTo(TempatPendampingan::class);
    }

    public function persoalan_pendidikan()
    {
        return $this->belongsTo(PersoalanPendidikan::class);
    }

    public function relawan_pendamping()
    {
        return $this->belongsTo(Relawan::class, 'nik_relawan_pendamping', 'nik_relawan');
    }
}
