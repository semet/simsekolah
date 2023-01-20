<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tahun_id',
        'nama',
        'awal',
        'akhir',
        'aktif'
    ];

    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }

    protected function awal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d, M Y')
        );
    }

    protected function akhir(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d, M Y')
        );
    }

    public function rapot(): HasMany
    {
        return $this->hasMany(Rapot::class);
    }

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }
}
