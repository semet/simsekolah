<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'departemen_id',
        'nip',
        'nuptk',
        'nama',
        'email',
        'telepon',
        'password',
        'jenis_kelamin',
        'jabatan',
        'foto',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'aktif',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }
}
