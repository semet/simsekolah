<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MapelCreateRequest;
use App\Models\Mapel;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::where('tingkat_id', request()->tingkat)
            ->get();

        return view('admin.mapel.index', [
            'mapel' => $mapel
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
    public function store(MapelCreateRequest $request)
    {
        DB::beginTransaction();

        try{
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

        }catch(Exception $e) {
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
