<?php

namespace App\View\Components\Admin\Semester;

use App\Models\Tahun;
use Illuminate\View\Component;

class Edit extends Component
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
        $tahun = Tahun::orderBy('created_at')
            ->get();
        return view('components.admin.semester.edit', [
            'tahun' => $tahun
        ]);
    }
}
