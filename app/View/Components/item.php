<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $name;
    public $eori;
    public $description;
    public $amount;
    public $date;
    public function __construct($id, $name, $eori , $description, $amount, $date)
    {
        //
        $this->id= $id;
        $this->name = $name;
        $this->eori = $eori;
        $this->description = $description;
        $this->amount = $amount;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item');
    }
}
