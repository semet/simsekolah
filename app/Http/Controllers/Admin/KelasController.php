<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasCreateRequest;
use App\Models\Departemen;
use App\Models\Kelas;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::where('tingkat_id', request()->tingkat)
            ->orderBy('nama')
            ->get();
        $departemen = Departemen::orderBy('nama')
            ->get();
        return view('admin.kelas.index', [
            'kelas' => $kelas,
            'departemen' => $departemen
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
    public function store(KelasCreateRequest $request)
    {
        DB::beginTransaction();

        try {
            $kelas = new Kelas();
            $kelas->departemen_id = $request->departemenId;
            $kelas->tingkat_id = $request->tingkatId;
            $kelas->nama = $request->nama;
            $kelas->kapasitas = $request->kapasitas;

            $kelas->save();

            DB::commit();

            return redirect()
                ->route('admin.kelas')
                ->with('message', 'Input data Kelas berhasil.');
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
        $kelas = Kelas::find($id);

        return response()->json([
            'kelas' => $kelas
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
            'idEdit' => 'required',
            'departemenIdEdit' => 'required',
            'tingkatIdEdit' => 'required',
            'namaEdit' => 'required'
        ]);

        try {
            $kelas = Kelas::find($request->idEdit);
            $kelas->departemen_id = $request->departemenIdEdit;
            $kelas->tingkat_id = $request->tingkatIdEdit;
            $kelas->nama = $request->namaEdit;
            $kelas->kapasitas = $request->kapasitasEdit;
            $kelas->save();

            return back()
                ->with('message', 'Update data kelas berhasil');
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
        $delete = Kelas::find($request->id)
            ->delete();
        if ($delete) {
            return response()->json([
                'message' => "Kelas berhasil dihapus"
            ], 201);
        }
    }
}
