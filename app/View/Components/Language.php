<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;

class Language extends Component
{
    public ?string $current_language = null;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $lang = \App\Models\Widget\Language::query()->where('slug', App::getLocale())->first();
        if (!empty($lang->title)) {
            $this->current_language = $lang->title;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $languages = \App\Models\Widget\Language::query()->get();

        return view('components.language', compact('languages'));
    }
}
