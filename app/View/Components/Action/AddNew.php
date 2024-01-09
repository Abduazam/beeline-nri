<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\View\Component;
use App\Models\Widget\TextName;
use Illuminate\Contracts\View\View;

class AddNew extends Component
{
    public string $text;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $route)
    {
        $this->text = TextName::getTextTranslation('add-new');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.add-new');
    }
}
