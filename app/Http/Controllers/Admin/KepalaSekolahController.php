<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KepalaSekolahCreateRequest;
use App\Models\Departemen;
use App\Models\KepalaSekolah;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepsek = KepalaSekolah::with('departemen')
                ->get();



        return view('admin.kepsek.index', [
            'kepsek' => $kepsek,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departemen = Departemen::doesntHave('kepalaSekolah')
                ->get();
        return view('admin.kepsek.create', [
            'departemen' => $departemen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KepalaSekolahCreateRequest $request)
    {
        DB::beginTransaction();

        try{
            $kepsek = new KepalaSekolah();
            $kepsek->departemen_id = $request->departemenId;
            $kepsek->nip = $request->nip;
            $kepsek->nama = $request->nama;
            $kepsek->email = $request->email;
            $kepsek->telepon = $request->telepon;
            $kepsek->password = bcrypt($request->nip);
            $kepsek->jenis_kelamin = $request->jenisKelamin;
            $kepsek->alamat = $request->alamat;
            $kepsek->tempat_lahir = $request->tempatLahir;
            $kepsek->tanggal_lahir = $request->tanggalLahir;

            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $fileName = $request->nip.'.'.$file->getClientOriginalExtension();

                $file->storeAs('public/kepsek', $fileName);

                $kepsek->foto = $fileName;
            }

            $kepsek->save();

            DB::commit();

            return redirect()
                ->route('admin.kepsek')
                ->with('message', 'Input data Kepala Sekolah berhasil.');

        }catch (Exception $e) {

            DB::rollBack();

            if($e instanceof QueryException){
                return back()->with('error', 'Base table or view not found! Please run migration.');
            }else{
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
