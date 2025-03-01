<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class TempatPendampingan extends Model
{
    use HasFactory;

    protected $table = 'tempat_pendampingan';
    protected $fillable = [
        'kategori',
        'nama', 
        'alamat',
        'kabupaten_id',
        'kecamatan_id', 
        'no_telp',
        'PIC'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
