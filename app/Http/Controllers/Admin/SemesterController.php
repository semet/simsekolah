<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterCreateRequest;
use App\Models\Semester;
use App\Models\Tahun;
use App\Services\SemesterService;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $semester  = Semester::where('tahun_id', request()->tahun)
            ->get();

        return view('admin.semester.index', [
            'semester' => $semester
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Carbon::parse($request->awal)->greaterThan(Carbon::parse($request->akhir))) {
            return back()->with('error', 'Tahun awal harus lebih kecil dari tahun akhir');
        }
        DB::beginTransaction();

        try {
            $semester = new Semester();
            $semester->tahun_id = $request->tahunId;
            $semester->nama = $request->nama;
            $semester->awal = $request->awal;
            $semester->akhir = $request->akhir;
            $semester->aktif = $request->status === 'on' ? 1 : 0;

            $semester->save();

            DB::commit();

            return redirect()
                ->route('admin.semester', 'tahun=' . $request->tahunId)
                ->with('message', 'Input data Semester berhasil.');
        } catch (Exception $e) {

            DB::rollBack();

            if ($e instanceof QueryException) {
                return back()->with('error', 'Base table or view not found! Please run migration.');
            } else {
                return back()->with('error', $e->getMessage());
            }
        }
    }
    /**
     * Toggle aktif status
     *
     * @param  int  $id
     * @param  App\Services\SemesterService $semesterService
     * @return \Illuminate\Http\Response
     */
    public function toggle(SemesterService $semesterService, $id)
    {
        $semesterService->toggleActive($id);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semester = Semester::find($id);

        return response()->json([
            'semester' => $semester
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'tahunIdEdit' => 'required',
            'namaEdit' => 'required',
            'awalEdit' => 'required',
            'akhirEdit' => 'required',
        ]);
        try {
            $semester = Semester::find($request->idEdit);
            $semester->tahun_id = $request->tahunIdEdit;
            $semester->nama = $request->namaEdit;
            $semester->awal = $request->awalEdit;
            $semester->akhir = $request->akhirEdit;
            $semester->save();

            return back()
                ->with('message', 'Update data semester berhasil');
        } catch (Exception $e) {
            return back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Semester::find($request->id)
            ->delete();
        if ($delete) {
            return response()->json([
                'message' => "Semester berhasil dihapus"
            ], 201);
        }
    }
}
