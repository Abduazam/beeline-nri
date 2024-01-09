<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\View\Component;
use App\Models\Widget\TextName;
use Illuminate\Contracts\View\View;

class Submit extends Component
{
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $target)
    {
        $this->text = TextName::getTextTranslation('save');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.submit');
    }
}
