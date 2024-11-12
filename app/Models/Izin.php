<?php
namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Izin extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan nama default plural
    protected $table = 'izins';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',
        'petugas_id',
        'kategoriizin_id',
        'tanggal_izin',
        'tanggal_masuk',
        'alasan_izin',
        'status',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriizin_id');
    }

    // Relasi dengan model Petugas

}
