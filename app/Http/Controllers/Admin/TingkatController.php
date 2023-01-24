<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTingkatRequest;
use App\Models\Departemen;
use App\Models\Tingkat;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tingkat = Tingkat::where('departemen_id', request()->departemen)
            ->orderBy('nama')
            ->get();

        $departemen = Departemen::select(['id', 'nama'])
            ->orderBy('nama')
            ->get();
        return view('admin.tingkat.index', [
            'tingkat' => $tingkat,
            'departemen' => $departemen
        ]);
        //
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
    public function store(CreateTingkatRequest $request)
    {
        DB::beginTransaction();

        try {
            $tingkat = new Tingkat();
            $tingkat->departemen_id = $request->departemenId;
            $tingkat->nama = $request->nama;

            $tingkat->save();

            DB::commit();

            return redirect()
                ->route('admin.tingkat', 'departemen=' . $request->departemenId)
                ->with('message', 'Input data Departemen berhasil.');
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
        $tingkat = Tingkat::find($id);

        return response()->json([
            'tingkat' => $tingkat
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
            'departemenIdEdit' => 'required',
            'namaEdit' => 'required'
        ]);

        try {
            $tingkat = Tingkat::find($request->idEdit);
            $tingkat->departemen_id = $request->departemenIdEdit;
            $tingkat->nama = $request->namaEdit;
            $tingkat->save();

            return back()
                ->with('message', 'Update data tingkat berhasil');
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
        $delete = Tingkat::find($request->id)
            ->delete();
        if ($delete) {
            return response()->json([
                'message' => "Semester berhasil dihapus"
            ], 201);
        }
    }
}
