<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Rapot;
use App\Services\SemesterService;
use App\Services\TahunService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RapotController extends Controller
{
    public function __construct(
        public TahunService $tahunService,
        public SemesterService $semesterService
    ){}

    public function index()
    {

        return view('siswa.rapot.index');
    }

    public function getRapot(Request $request): JsonResponse
    {
        if($request->ajax()) {
            $rapot = Rapot::where('kelas_id', auth()->guard('siswa')->user()->kelas->id)
                ->where('tahun_id', request()->tahun)
                ->where('semester_id', request()->semester)
                ->where('siswa_id', auth()->guard('siswa')->id())
                ->get();

            return DataTables::of($rapot)
                ->addIndexColumn()
                ->addColumn('mata_pelajaran', fn($rp) => $rp->mapel->nama)
                ->addColumn('nilai', fn($rp) => $rp->nilai)
                ->addColumn('rata_rata', fn($rp) => $rp->nilai)
                ->make(true);
        }

        throw new Exception("Invalid request");
    }
}
