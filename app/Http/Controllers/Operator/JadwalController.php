<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalCreateRequest;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Tingkat;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = auth()->guard('operator')->user()->departemen->id;
        $tingkat = request()->tingkat;
        $kelas = request()->kelas;
        $hari = request()->hari;

        $jadwal = Jadwal::where('departemen_id', $departemen)
                ->where('tingkat_id', $tingkat)
                ->where('kelas_id', $kelas)
                ->where('hari', $hari)
                ->get();

        return view('operator.jadwal.index', [
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::where('departemen_id', auth()->guard('operator')->user()->departemen->id)
                ->get();

        return view('operator.jadwal.create', [
            'guru' => $guru
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalCreateRequest $request)
    {
        try{
            $jadwal = new Jadwal();
            $jadwal->departemen_id = auth()->guard('operator')->user()->departemen->id;
            $jadwal->tingkat_id = $request->tingkatId;
            $jadwal->kelas_id = $request->kelasId;
            $jadwal->guru_id = $request->guruId;
            $jadwal->hari = $request->hari;
            $jadwal->awal = $request->awal;
            $jadwal->akhir = $request->akhir;
            $jadwal->save();

            return redirect()
                ->route('operator.jadwal.create')
                ->with('message', 'Input data jadwal berhasil');

        }catch(Exception $e){
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
