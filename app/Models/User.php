<?php
namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'nis',
        'email',
        'jabatan',
        'jenis_kelamin',
        'alamat',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship for user as a requester
    public function izins()
    {
        return $this->hasMany(Izin::class, 'user_id');
    }

    // Relationship for user as a petugas/admin handling the request
    public function handledIzins()
    {
        return $this->hasMany(Izin::class, 'petugas_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'user_id');
    }
}
