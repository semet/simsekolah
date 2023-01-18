<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mapel extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'departemen_id',
        'tingkat_id',
        'kode',
        'nama',
        'durasi'
    ];

    public function tingkat(): BelongsTo
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function guru(): HasMany
    {
        return $this->hasMany(Guru::class);
    }
}
