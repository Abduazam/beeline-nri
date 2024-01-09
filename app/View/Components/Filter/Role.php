<?php

namespace App\View\Components\Filter;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Role extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $roles)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter.role');
    }
}
