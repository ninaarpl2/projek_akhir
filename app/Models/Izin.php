<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izins';

    protected $fillable = [
        'user_id',
        'petugas_id',
        'kategoriizin_id',
        'tanggal_izin',
        'tanggal_masuk',
        'alasan_izin',
        'status',
    ];

    // Relationship with User as the requester
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with User as the petugas/admin
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriizin_id');
    }
}
