<?php

namespace App\View\Components\Toolbars\Admin;

use App\Models\Departemen;
use Illuminate\View\Component;

class Tingkat extends Component
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
        return view('components.toolbars.admin.tingkat', [
            'departemen' => $departemen
        ]);
    }
}
