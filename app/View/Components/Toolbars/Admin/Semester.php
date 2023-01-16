<?php

namespace App\View\Components\Toolbars\Admin;

use App\Models\Tahun;
use Illuminate\View\Component;

class Semester extends Component
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

        return view('components.toolbars.admin.semester', [
            'tahun' => $tahun
        ]);
    }
}
