<?php

namespace App\View\Components\Modal\Opens;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Restore extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $target)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.opens.restore');
    }
}
