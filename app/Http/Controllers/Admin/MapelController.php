<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MapelCreateRequest;
use App\Models\Departemen;
use App\Models\Mapel;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = Departemen::orderBy('nama')
            ->get();

        return view('admin.mapel.index', [
            'departemen' => $departemen
        ]);
    }

    public function getMapel(Request $request)
    {
        if ($request->ajax()) {
            $mapel = Mapel::where('departemen_id', $request->departemenId)
                ->where('tingkat_id', $request->tingkatId)
                ->get();

            return DataTables::of($mapel)
                ->addColumn('kode', fn ($m) => $m->kode)
                ->addColumn('nama', fn ($m) => $m->nama)
                ->addColumn('durasi', fn ($m) => $m->durasi)
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="btn-group btn-group-sm" role="group" aria-label="Mapel Options">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editMapel" id=' . "'$row->id'" . '>
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger" onclick="deleteMapel(' . "'$row->id'" . ')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
    public function store(MapelCreateRequest $request)
    {
        DB::beginTransaction();

        try {
            $mapel = new Mapel();
            $mapel->departemen_id = $request->departemenId;
            $mapel->tingkat_id = $request->tingkatId;
            $mapel->kode = $request->kode;
            $mapel->nama = $request->nama;
            $mapel->durasi = $request->durasi;

            $mapel->save();

            DB::commit();

            return redirect()
                ->route('admin.mapel')
                ->with('message', 'Input data Mata Pelajaran berhasil.');
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
        $mapel = Mapel::find($id);

        return response()->json([
            'mapel' => $mapel
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
        try {
            $mapel = Mapel::find($request->idEdit);
            $mapel->departemen_id = $request->departemenIdEdit;
            $mapel->tingkat_id = $request->tingkatIdEdit;
            $mapel->kode = $request->kodeEdit;
            $mapel->nama = $request->namaEdit;
            $mapel->durasi = $request->durasiEdit;

            $mapel->save();

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
        $delete = Mapel::find($request->id)
            ->delete();
        if ($delete) {
            return response()->json([
                'message' => "Mata Pelajaran berhasil dihapus"
            ], 201);
        }
    }
}
