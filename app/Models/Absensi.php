<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_absensi',
        'jam_masuk',
        'jam_keluar',
        'jam_lembur',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
