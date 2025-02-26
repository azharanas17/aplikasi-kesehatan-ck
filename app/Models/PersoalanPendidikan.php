<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersoalanPendidikan extends Model
{
    use HasFactory;

    protected $table = 'persoalan_pendidikan';
    protected $fillable = [
        'nama', 
        'deskripsi'
    ];
}
