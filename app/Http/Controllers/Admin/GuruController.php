<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuruCreateRequest;
use App\Http\Requests\GuruUpdateRequest;
use App\Models\Departemen;
use App\Models\Guru;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.guru.index',);
    }

    public function getGuru(Request $request)
    {
        if ($request->ajax()) {
            $guru = Guru::where('departemen_id', $request->departemenId)
                ->where('tingkat_id', $request->tingkatId)
                ->with('mapel')
                ->get();

            return DataTables::of($guru)
                ->addColumn('nip', fn ($gr) => $gr->nip)
                ->addColumn('nama', fn ($gr) => $gr->nama)
                ->addColumn('email', fn ($gr) => $gr->email)
                ->addColumn('mata_pelajaran', fn ($gr) => $gr->mapel?->nama)
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="btn-group btn-group-sm" role="group" aria-label="Mapel Options">
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
        $departemen = Departemen::select(['id', 'nama'])
            ->get();
        return view('admin.guru.create', [
            'departemen' => $departemen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruCreateRequest $request)
    {
        try {
            $guru = new Guru;
            $guru->departemen_id = $request->departemenId;
            $guru->tingkat_id = $request->tingkatId;
            $guru->mapel_id = $request->mapelId;
            $guru->nip = $request->nip;
            $guru->nuptk = $request->nuptk;
            $guru->nama = $request->nama;
            $guru->email = $request->email;
            $guru->password = bcrypt($request->nip);
            $guru->telepon = $request->telepon;
            $guru->jenis_kelamin = $request->jenisKelamin;
            $guru->alamat = $request->alamat;
            $guru->tempat_lahir = $request->tempatLahir;
            $guru->tanggal_lahir = $request->tanggalLahir;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = $request->nip . '.' . $file->getClientOriginalExtension();

                $file->storeAs('public/guru', $fileName);

                $guru->foto = $fileName;
            }

            $guru->save();

            return redirect()
                ->route('admin.guru', [
                    'departemen' => $request->departemenId,
                    'tingkat' => $request->tingkatId
                ])
                ->with('message', 'Input data guru berhasil');
        } catch (Exception $e) {
            return back()
                ->with('error', $e->getMessage());
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
        $guru = Guru::find($id);

        return view('admin.guru.show', [
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);

        $departemen = Departemen::select(['id', 'nama'])
            ->get();

        return view('admin.guru.edit', [
            'guru' => $guru,
            'departemen' => $departemen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuruUpdateRequest $request, $id)
    {
        try {
            $guru = Guru::find($id);
            $guru->departemen_id = $request->departemenId;
            $guru->tingkat_id = $request->tingkatId;
            $guru->mapel_id = $request->mapelId;
            $guru->nip = $request->nip;
            $guru->nuptk = $request->nuptk;
            $guru->nama = $request->nama;
            $guru->jenis_kelamin = $request->jenisKelamin;
            $guru->alamat = $request->alamat;
            $guru->tempat_lahir = $request->tempatLahir;
            $guru->tanggal_lahir = $request->tanggalLahir;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = $request->nip . '.' . $file->getClientOriginalExtension();

                if (Storage::exists('public/guru/' . $guru->foto)) {
                    Storage::delete('public/guru/' . $guru->foto);
                }
                Storage::putFileAs('public/guru', $file, $fileName);
                $guru->foto = $fileName;
            }
            $guru->save();

            return redirect()
                ->route('admin.guru.show', $guru->id)
                ->with('message', 'Data guru berhasil diupdate');
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
        $delete = Guru::find($request->id)
            ->delete();
        if ($delete) {
            return response()->json([
                'message' => "Guru berhasil dihapus"
            ], 201);
        }
    }
}
