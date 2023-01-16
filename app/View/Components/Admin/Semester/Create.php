<?php

namespace App\View\Components\Admin\Semester;

use App\Models\Tahun;
use Illuminate\View\Component;

class Create extends Component
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
        $tahun = Tahun::has('semester', '<', 2)->orderBy('awal', 'asc')->get();

        return view('components.admin.semester.create', [
            'tahun' => $tahun,
        ]);
    }
}
