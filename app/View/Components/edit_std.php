<?php

namespace App\View\Components;

use Illuminate\View\Component;

class edit_std extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $student;
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit_std');
    }
}
