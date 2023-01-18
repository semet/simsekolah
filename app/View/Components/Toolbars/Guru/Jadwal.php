<?php

namespace App\View\Components\Toolbars\Guru;

use App\Models\Kelas;
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
        $kelas = Kelas::where('departemen_id',
                                auth()
                                    ->guard('guru')
                                    ->user()
                                    ->departemen_id)
                ->where('tingkat_id',
                                auth()
                                    ->guard('guru')
                                    ->user()
                                    ->tingkat_id
                )
                ->get();

        return view('components.toolbars.guru.jadwal', [
            'kelas' => $kelas
        ]);
    }
}
