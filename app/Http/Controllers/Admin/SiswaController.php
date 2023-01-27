<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.siswa.index');
    }

    public function getSiswa (Request $request)
    {
        if($request->ajax())
        {
            $siswa = Siswa::where('kelas_id', $request->kelasId)
                ->where('tahun_id', $request->tahunId)
                ->get();

            return DataTables::of($siswa)
                ->addColumn('nis', fn($s) => $s->nis)
                ->addColumn('nisn', fn($s) => $s->nisn)
                ->addColumn('nama', fn($s) => $s->nama)
                ->addColumn('jenis_kelamin', fn($s) => $s->jenis_kelamin)
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="btn-group btn-group-sm" role="group" aria-label="Sisa Options">
                        <a class="btn btn-primary" href="' . route('admin.guru.show', $row->id) . '">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-info" href="' . route('admin.guru.edit', $row->id) . '">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" onclick="deleteGuru(' . "'$row->id'" . ')">
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
