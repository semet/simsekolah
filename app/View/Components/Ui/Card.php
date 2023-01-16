<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Card title
     *
     * @var String
     */
    public $title;
    /**
     * Card width
     *
     * @var String|Number
     * available value @var 2|4|6|8|10|12
     */
    public $width;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $width = 12)
    {
        $this->title = $title;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.card');
    }
}
