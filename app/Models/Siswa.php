<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'departemen_id',
        'tingkat_id',
        'kelas_id',
        'nis',
        'nisn',
        'nama',
        'telepon',
        'password',
        'jenis_kelamin',
        'agama',
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

    public function tingkat(): BelongsTo
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function rapot(): HasMany
    {
        return $this->hasMany(Rapot::class);
    }
}
