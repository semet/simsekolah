<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Services\TahunService;
use Illuminate\Http\Request;

class RapotController extends Controller
{
    public function index(TahunService $tahun)
    {
        dd( $tahun->getActiveId());
    }
}
