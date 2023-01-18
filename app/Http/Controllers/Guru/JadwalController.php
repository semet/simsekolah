<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        $jadwal = Jadwal::where('departemen_id', auth()->guard('guru')->user()->departemen_id)
            ->where('tingkat_id', auth()->guard('guru')->user()->tingkat_id)
            ->where('kelas_id', request()->kelas)
            ->where('guru_id', auth()->guard('guru')->user()->id)
            ->where('hari', request()->hari)
            ->get();
        return view('guru.jadwal.index', [
            'jadwal' => $jadwal
        ]);
    }
}
