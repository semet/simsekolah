<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = Departemen::latest()->get();

        return view('admin.departemen.index', [
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
    public function store(Request $request)
    {
        $request->validate([
            'namaDepartemen' => 'required'
        ]);

        try {
            $departemen = new Departemen();
            $departemen->nama = $request->namaDepartemen;
            $departemen->keterangan = $request->keterangan;
            $departemen->save();

            return back()->with('message', 'Input data departemen berhasil!');
        } catch (QueryException $e) {
            return back()->with('error', 'Base table or view not found! Please run migration.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
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
        $departemen = Departemen::find($id);

        return response()->json([
            'departemen' => $departemen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $departemen = Departemen::find($request->departemenIdEdit);
            $departemen->nama = $request->namaDepartemenEdit;
            $departemen->keterangan = $request->keteranganEdit;
            $departemen->save();

            return back()->with('message', 'Update data departemen berhasil');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
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
        $delete = Departemen::find($request->id)
            ->delete();
        if ($delete) {
            return response()->json([
                'message' => "Departemen berhasil dihapus"
            ], 201);
        }
    }
}
