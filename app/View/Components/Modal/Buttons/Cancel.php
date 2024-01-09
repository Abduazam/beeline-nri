<?php

namespace App\View\Components\Modal\Buttons;

use Closure;
use Illuminate\View\Component;
use App\Models\Widget\TextName;
use Illuminate\Contracts\View\View;

class Cancel extends Component
{
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->text = TextName::getTextTranslation('cancel');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.buttons.cancel');
    }
}
