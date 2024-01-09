<?php

namespace App\View\Components\Modal\Opens;

use Closure;
use Illuminate\View\Component;
use App\Models\Widget\TextName;
use Illuminate\Contracts\View\View;

class Add extends Component
{
    public string $text;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $target, public string $icon)
    {
        $this->text = TextName::getTextTranslation('add');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.opens.add');
    }
}
