<?php

namespace App\View\Components\Toolbars\Operator;

use App\Models\Tahun;
use App\Models\Tingkat;
use Illuminate\View\Component;

class Jadwal extends Component
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
        $tahun = Tahun::orderBy('awal')->get();

        $tingkat = Tingkat::where(
            'departemen_id', auth()
                                ->guard('operator')
                                ->user()
                                ->departemen
                                ->id
        )
        ->get();

        return view('components.toolbars.operator.jadwal', [
            'tahun' => $tahun,
            'tingkat' => $tingkat
        ]);
    }
}
