<?php

namespace App\View\Components\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Region extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $regions, public string $default = "No region")
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter.region');
    }
}
