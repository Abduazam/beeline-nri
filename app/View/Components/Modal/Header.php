<?php

namespace App\View\Components\Modal;

use App\Models\Widget\TextName;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public string $actionText;
    public string $modelText;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $action, public string $model)
    {
        $this->actionText = TextName::getTextTranslation($action);
        $this->modelText = mb_strtolower(TextName::getTextTranslation($model));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.header');
    }
}
