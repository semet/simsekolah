<?php

namespace App\View\Components\Toolbars\Admin;

use App\Models\Departemen;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Mapel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Collection $departemen
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toolbars.admin.mapel');
    }
}
