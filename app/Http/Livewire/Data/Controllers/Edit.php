<?php

namespace App\Http\Livewire\Data\Controllers;

use App\Models\Area\Region\Region;
use App\Models\Data\Controllers\Controller;
use App\Models\Data\Position\State\State;
use App\Services\Data\Controller\Update\UpdateService;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Throwable;

class Edit extends Component
{
    public Controller $controller;

    protected array $rules = [
        'controller.region_id' => ['required', 'numeric', 'exists:regions,id'],
        'controller.number' => ['required', 'string'],
        'controller.state_id' => ['nullable', 'numeric', 'exists:states,id'],
        'controller.name' => ['required', 'string'],
        'controller.gfk' => ['nullable', 'string'],
        'controller.address' => ['required', 'string'],
        'controller.position' => ['required', 'string'],
        'controller.number_position' => ['required', 'string'],
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
    public function update(UpdateService $service)
    {
        $validatedData = $this->validate();

        $service->update($this->controller, $validatedData);

        return to_route('data.controllers.index');
    }

    public function render(): View
    {
        return view('livewire.data.controllers.edit', [
            'regions' => Region::query()->withWhereHas('translations',  function ($query) {
                $query->where('locale', app()->getLocale());
            })->get(),
            'states' => State::query()->withWhereHas('translations',  function ($query) {
                $query->where('locale', app()->getLocale());
            })->get(),
        ]);
    }
}
