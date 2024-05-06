<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class enishow extends Component
{
    /**
     * Create a new component instance.
     * 
     */

    public $name;
    public $income;
    public $outcome;
    public $max;
    public function __construct($name, $income, $outcome, $max)
    {
        //
        $this->name = $name;
        $this->income = $income;
        $this->outcome = $outcome;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.enishow');
    }
}
