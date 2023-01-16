<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TahunCreateRequest;
use App\Models\Tahun;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = Tahun::latest()->get();

        return view('admin.tahun.index', [
            'tahun' => $tahun
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
    public function store(TahunCreateRequest $request)
    {
        if(Carbon::parse($request->awal)->greaterThan(Carbon::parse($request->akhir)) ){
            return back()->with('error', 'Tahun awal harus lebih kecil dari tahun akhir');
        }
        DB::beginTransaction();

        try{
            $tahun = new Tahun();
            $tahun->nama = $request->nama;
            $tahun->awal = $request->awal;
            $tahun->akhir = $request->akhir;
            $tahun->aktif = $request->status === 'on' ? 1 : 0;

            $tahun->save();

            DB::commit();

            return redirect()
                ->route('admin.tahun')
                ->with('message', 'Input data Tahun berhasil.');
        }catch(Exception $e){

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
