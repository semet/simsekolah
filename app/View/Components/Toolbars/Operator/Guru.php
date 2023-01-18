<?php

namespace App\View\Components\Toolbars\Operator;

use App\Models\Departemen;
use Illuminate\View\Component;

class Guru extends Component
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
        return view('components.toolbars.operator.guru');
    }
}
