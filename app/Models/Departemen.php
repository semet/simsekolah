<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Departemen extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama',
        'keterangan'
    ];

    public function kepalaSekolah(): HasOne
    {
        return $this->hasOne(KepalaSekolah::class);
    }
}
