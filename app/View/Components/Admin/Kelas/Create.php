<?php

namespace App\View\Components\Admin\Kelas;

use App\Models\Departemen;
use App\Models\Tingkat;
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
        $departemen = Departemen::orderBy('nama')
                ->get();

        return view('components.admin.kelas.create', [
            'departemen' => $departemen
        ]);
    }
}
