<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KepalaSekolah extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'departemen_id',
        'nip',
        'nama',
        'email',
        'telepon',
        'password',
        'jenis_kelamin',
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
