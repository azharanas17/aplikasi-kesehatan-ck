<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kecamatan;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';
    protected $fillable = [
        'kecamatan_id', 
        'nama', 
        'deskripsi'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
