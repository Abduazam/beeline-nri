<?php

namespace App\View\Components\Modal\Buttons;

use Closure;
use Illuminate\View\Component;
use App\Models\Widget\TextName;
use Illuminate\Contracts\View\View;

class Accept extends Component
{
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct(public bool $disabled)
    {
        $this->text = TextName::getTextTranslation('accept');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.buttons.accept');
    }
}
