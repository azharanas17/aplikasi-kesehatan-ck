<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TempatPendampingan extends Model
{
    use HasFactory;

    protected $table = 'tempat_pendampingan';
    protected $fillable = [
        'kategori',
        'nama', 
        'alamat', 
        'deskripsi',
        'PIC'
    ];
}
