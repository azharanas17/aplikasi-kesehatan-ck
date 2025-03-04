<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Provinsi;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';
    protected $fillable = [
        'provinsi_id', 
        'nama', 
        'deskripsi'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
