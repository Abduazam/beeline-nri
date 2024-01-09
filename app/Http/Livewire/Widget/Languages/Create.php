<?php

namespace App\Http\Livewire\Widget\Languages;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Services\Widget\Languages\Create\CreateService;

class Create extends Component
{
    public ?string $slug = null;
    public ?string $title = null;

    protected array $rules = [
        'slug' => ['required', 'unique:languages,slug', 'min:2', 'max:5'],
        'title' => ['required', 'unique:languages,title', 'min:2'],
    ];

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    /**
     * @throws Throwable
     */
    public function store(CreateService $service): void
    {
        $validatedData = $this->validate();

        $service->create($validatedData);

        $this->dispatchBrowserEvent('refresh-page');
    }

    public function render(): View
    {
        return view('livewire.widget.languages.create');
    }
}
