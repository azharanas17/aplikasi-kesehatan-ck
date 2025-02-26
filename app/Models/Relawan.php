<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Relawan extends Model
{
    use HasFactory;

    protected $table = 'relawan';
    protected $fillable = [
        'nik_relawan',
        'jabatan',
        'no_anggota',
    ];

    public function relawan()
    {
        return $this->belongsTo(User::class, 'nik_relawan', 'nik');
    }
}
