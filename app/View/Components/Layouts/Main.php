<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Color mode
     *
     * @var [string]
     */
    public $mode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode = 'light')
    {
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.main');
    }
}
