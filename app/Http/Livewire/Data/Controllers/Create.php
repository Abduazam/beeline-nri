<?php

namespace App\Http\Livewire\Data\Controllers;

use App\Models\Area\Region\Region;
use App\Models\Data\Position\State\State;
use App\Services\Data\Controller\Create\CreateService;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\View\View;
use Throwable;

class Create extends Component
{
    public int $region_id = 0;
    public string $number;
    public int $state_id = 0;
    public string $name;
    public string $gfk;
    public string $address;
    public string $position;
    public string $number_position;

    protected array $rules = [
        'region_id' => ['required', 'numeric', 'exists:regions,id'],
        'number' => ['required', 'string'],
        'state_id' => ['required', 'numeric', 'exists:states,id'],
        'name' => ['required', 'string'],
        'gfk' => ['nullable', 'string'],
        'address' => ['required', 'string'],
        'position' => ['required', 'string'],
        'number_position' => ['required', 'string'],
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
    public function store(CreateService $service)
    {
        $validatedData = $this->validate();

        $service->create($validatedData);

        return to_route('data.controllers.index');
    }

    public function render(): View
    {
        return view('livewire.data.controllers.create', [
            'regions' => Region::query()->withWhereHas('translations',  function ($query) {
                $query->where('locale', app()->getLocale());
            })->get(),
            'states' => State::query()->withWhereHas('translations',  function ($query) {
                $query->where('locale', app()->getLocale());
            })->get(),
        ]);
    }
}
