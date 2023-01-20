<?php
namespace App\Services;

use App\Models\Tahun;

class TahunService {
    /**
     * Tahun Model
     *
     * @var App\Models\Tahun;
     */
    public $tahun;

    public function __construct(Tahun $tahun)
    {
        $this->tahun = $tahun;
    }
    /**
     * get current active year
     *
     * @return Illuminate\Database\Eloquent\Collection|null
     */
    public function getActiveId()
    {
        return $this->tahun->where('aktif', 1)->first()->id;
    }
}
