<?php

namespace App\View\Components\Toolbars\Guru;

use App\Models\Kelas;
use App\Models\Tahun;
use Illuminate\View\Component;

class Rapot extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tahun = Tahun::orderBy('awal')
            ->get();

        $kelas = Kelas::where('tingkat_id', auth()->guard('guru')->user()->tingkat_id)
            ->select(['id', 'nama'])
            ->get();

        return view('components.toolbars.guru.rapot', [
            'tahun' => $tahun,
            'kelas' => $kelas
        ]);
    }
}
