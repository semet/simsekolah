<?php

namespace App\View\Components\Admin\Tingkat;

use App\Models\Departemen;
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
        $departemen = Departemen::select(['id', 'nama'])
                ->orderBy('nama')
                ->get();

        return view('components.admin.tingkat.create', [
            'departemen' => $departemen
        ]);
    }
}
