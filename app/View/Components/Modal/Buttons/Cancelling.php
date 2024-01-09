<?php

namespace App\View\Components\Modal\Buttons;

use App\Models\Widget\TextName;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cancelling extends Component
{
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct(public bool $disabled)
    {
        $this->text = TextName::getTextTranslation('cancelling');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.buttons.cancelling');
    }
}
