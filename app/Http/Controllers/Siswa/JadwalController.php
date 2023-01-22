<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Services\SemesterService;
use App\Services\TahunService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JadwalController extends Controller
{



    public function __construct(
        public TahunService $tahun,
        public SemesterService $semester
    ){}

    public function index()
    {

        return view('siswa.jadwal.index');
    }

    public function getJadwal(Request $request): JsonResponse
    {
        if($request->ajax()) {
            $jadwal = Jadwal::where('departemen_id', auth()->guard('siswa')->user()->departemen->id)
                ->where('tahun_id', $this->tahun->getActiveId())
                ->where('semester_id', $this->semester->getActiveId())
                ->where('tingkat_id', auth()->guard('siswa')->user()->tingkat->id)
                ->where('kelas_id', auth()->guard('siswa')->user()->kelas->id)
                ->where('hari', request()->hari)
                ->get();

            return DataTables::of($jadwal)
                ->addColumn('hari', fn($jadwal) => $jadwal->hari)
                ->addColumn('awal', fn($jadwal) => $jadwal->awal)
                ->addColumn('akhir', fn($jadwal) => $jadwal->akhir)
                ->addColumn('guru', fn($jadwal) => $jadwal->guru->nama)
                ->make(true);
        }
        throw new Exception("Invalid request");
    }
}
