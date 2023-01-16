<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tingkat extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'departemen_id',
        'nama'
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}
