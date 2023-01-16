<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tingkat_id',
        'nama',
        'kapasitas'
    ];

    public function tingkat(): BelongsTo
    {
        return $this->belongsTo(Tingkat::class);
    }
}
