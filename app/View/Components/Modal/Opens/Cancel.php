<?php

namespace App\View\Components\Modal\Opens;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cancel extends Component
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
        return view('components.modal.opens.cancel');
    }
}
