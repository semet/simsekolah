<?php

namespace App\Services;

use App\Models\Semester;

class SemesterService
{
    /**
     * Tahun Model
     *
     * @var App\Models\Semester;
     */
    public $semester;

    public function __construct(Semester $semester)
    {
        $this->semester = $semester;
    }
    /**
     * get current active year
     *
     * @return Illuminate\Database\Eloquent\Collection|null
     */
    public function getActiveId()
    {
        return $this->semester->where('aktif', 1)->first()->id;
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

        $semester = Semester::find($id);
        $semester->aktif = !$semester->aktif;
        $semester->save();
    }

    /**
     * Deactivate currently active semester
     *
     * @return Bool
     */
    public function deActivateCurrentActive(): Bool
    {
        return Semester::where('aktif', 1)->update(['aktif' => 0]);
    }
}
