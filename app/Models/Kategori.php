<?php
namespace App\Models;

use App\Models\Izin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function izin(){
        return $this->hasMany(Izin::class, 'kategoriizin_id');
    }
}
