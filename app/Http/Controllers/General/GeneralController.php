<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\Tingkat;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function tingkatByDepartemen()
    {
        $tingkat = Tingkat::where('departemen_id', request()->departemen)
                ->get();

        return response()->json([
            'tingkat' => $tingkat
        ]);
    }

    public function kelasByTingkat()
    {
        $kelas = Kelas::where('tingkat_id', request()->tingkat)
                ->get();

        return response()->json([
            'kelas' => $kelas
        ]);
    }

    public function kelasByGuru()
    {
        $guru = Guru::find(request()->guru)
            ->load(['tingkat:id']);

        $kelas = Kelas::where('tingkat_id', $guru->tingkat->id)
            ->select(['id', 'nama'])
            ->get();

        return response()->json([
            'tingkatId' => $guru->tingkat->id,
            'kelas' => $kelas
        ]);
    }

    public function semesterByTahun()
    {
        $semester = Semester::where('tahun_id', request()->tahun)
                ->select(['id', 'nama'])
                ->get();

        return response()->json([
            'semester' => $semester
        ]);
    }
}
