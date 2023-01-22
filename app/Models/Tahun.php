<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tahun extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama',
        'awal',
        'akhir',
        'aktif'
    ];

    public function semester(): HasMany
    {
        return $this->hasMany(Semester::class);
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
