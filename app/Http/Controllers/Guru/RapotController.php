<?php

namespace App\Http\Controllers\Guru;

use App\Exports\Guru\RapotExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapotCreateRequest;
use App\Models\Rapot;
use App\Models\Siswa;
use App\Services\SemesterService;
use App\Services\TahunService;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class RapotController extends Controller
{

    public $activeTahun;
    public $activeSemester;


    public function __construct(TahunService $tahun, SemesterService $semester)
    {
        $this->activeTahun = $tahun->getActiveId();
        $this->activeSemester = $semester->getActiveId();
    }

    public function index()
    {
        return view('guru.rapot.index');
    }

    public function getRapot(Request $request)
    {
        if ($request->ajax()) {
            $rapot = Rapot::where('tahun_id', $request->tahunId)
                ->where('semester_id', $request->semesterId)
                ->where('guru_id', auth()->guard('guru')->id())
                ->where('mapel_id', auth()->guard('guru')->user()->mapel->id)
                ->where('kelas_id', $request->kelasId)
                ->get();
            return DataTables::of($rapot)
                ->addIndexColumn()
                ->addColumn('siswa', fn ($rapot) => $rapot->siswa->nama)
                ->addColumn('mata_pelajaran', fn ($rapot) => $rapot->guru->mapel->nama)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" onclick="editRapot(' . "'$row->id'" . ')">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $siswa = Siswa::where('departemen_id', auth()->guard('guru')->user()->departemen_id)
            ->where('tingkat_id', auth()->guard('guru')->user()->tingkat_id)
            ->where('kelas_id', request()->kelasId)
            ->whereNotIn('id', function ($query) {
                $query->select(['siswa_id'])
                    ->from('rapots')
                    ->where('tahun_id', $this->activeTahun)
                    ->where('semester_id', $this->activeSemester)
                    ->where('guru_id', auth()->guard('guru')->id())
                    ->where('mapel_id', auth()->guard('guru')->user()->mapel->id)
                    ->where('kelas_id', request()->kelasId)
                    ->get();
            })
            ->get();

        return view('guru.rapot.create', [
            'siswa' => $siswa
        ]);
    }

    public function store(RapotCreateRequest $request)
    {
        try {
            $rapot = new Rapot();
            $rapot->tahun_id = $this->activeTahun;
            $rapot->semester_id = $this->activeSemester;
            $rapot->guru_id = auth()->guard('guru')->id();
            $rapot->mapel_id = auth()->guard('guru')->user()->mapel->id;
            $rapot->kelas_id = $request->kelasId;
            $rapot->siswa_id = $request->siswaId;
            $rapot->nilai = $request->nilai;

            $rapot->save();

            return response()->json([
                'message' => 'Berhasil input data nilai'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'nilai' => 'required|numeric'
        ]);

        try {

            Rapot::find($request->id)
                ->update([
                    'nilai' => $request->nilai
                ]);

            return response()->json([
                'message' => 'Update nilai berhasil'
            ]);
        } catch (Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function exportExcel()
    {
        return (new RapotExport(request()->tahunId, request()->semesterId, request()->kelasId))->download('rapot.xlsx');
    }

    public function exportPdf()
    {
        return Excel::download(new RapotExport(request()->tahunId, request()->semesterId, request()->kelasId), 'rapot.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
