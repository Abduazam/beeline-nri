<?php

namespace App\View\Components\Modal\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Response extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $disabled)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.buttons.response');
    }
}
