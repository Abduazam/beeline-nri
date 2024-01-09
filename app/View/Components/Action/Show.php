<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Show extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $route)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.show');
    }
}
