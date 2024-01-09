<?php

namespace App\View\Components\Action;

use App\Models\Widget\TextName;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Archive extends Component
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
        return view('components.action.archive');
    }
}
