<?php

namespace App\Services;

use App\Models\Tahun;
use Str;

class TahunService
{
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
    /**
     * Toggle Aktif status
     *
     * @param String $id
     * @return void
     */
    public function toggleActive($id): void
    {
        $this->deActivateCurrentActive();

        $tahun = Tahun::find($id);
        $tahun->aktif = !$tahun->aktif;
        $tahun->save();
    }
    /**
     * Deactivate currently active tahun
     *
     * @return Bool
     */
    public function deActivateCurrentActive(): Bool
    {
        return Tahun::where('aktif', 1)->update(['aktif' => 0]);
    }
}
