<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kabupaten;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $fillable = [
        'kabupaten_id', 
        'nama', 
        'deskripsi'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
