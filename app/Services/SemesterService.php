<?php
namespace App\Services;

use App\Models\Semester;

class SemesterService {
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
}
