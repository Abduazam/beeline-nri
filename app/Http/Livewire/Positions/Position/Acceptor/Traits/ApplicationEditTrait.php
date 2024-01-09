<?php

namespace App\Http\Livewire\Positions\Position\Acceptor\Traits;

use App\Helpers\Helper;
use App\Repository\Positions\Position\PositionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

trait ApplicationEditTrait
{
    public string $action = 'send';
    public bool $is_archive = false;

    public Collection $place_type_groups;
    public Collection $areas;

    public int $coordinate_type_id;

    protected array $rules = [
        'application.position.id' => ['required', 'numeric'],
        'application.position.source' => ['required', 'string'],
        'application.position.company_id' => ['required', 'numeric', 'exists:companies,id'],
        'application.position.place_type_id' => ['required', 'numeric', 'exists:place_types,id'],
        'application.position.place_type_group_id' => ['required', 'numeric', 'exists:place_type_groups,id'],
        'application.position.purpose_id' => ['required', 'numeric', 'exists:purposes,id'],
        'application.position.region_id' => ['required', 'numeric', 'exists:regions,id'],
        'application.position.area_id' => ['nullable', 'numeric', 'exists:areas,id'],
        'application.position.territory_id' => ['required', 'numeric', 'exists:regions,id'],
        'application.position.name' => ['required', 'string'],
        'application.position.address' => ['nullable', 'string'],
        'application.position.coordinate_id' => ['required', 'numeric', 'exists:coordinate_types,id'],
        'coordinate_type_id' => ['required', 'numeric'],
        'coordinate_values' => ['required', 'array'],
        'coordinate_values.*' => ['required', 'array'],
        'coordinate_values.*.decimal' => ['required', 'numeric'],
        'degree_values' => ['required', 'array'],
        'degree_values.*' => ['required', 'array'],
        'degree_values.*.*' => ['required', 'numeric'],
        'application.comment' => ['string'],
    ];

    /**
     * @throws ValidationException
     */
    public function updated($property): void
    {
        $this->validateOnly($property);
    }

    public function mount(): void
    {
        $repository = new PositionRepository();
        $this->place_type_groups = $repository->getUpdatedPlaceTypeGroups($this->application->position->place_type_id);
        $this->areas = $repository->getUpdatedAreas($this->application->position->region_id);
        $this->coordinate_type_id = $this->decimal;
        $this->coordinate_values['latitude']['decimal'] = $this->application->position->latitude;
        $this->coordinate_values['longitude']['decimal'] = $this->application->position->longitude;
        $this->handleUpdatedProperty('latitude.decimal', new Helper());
        $this->handleUpdatedProperty('longitude.decimal', new Helper());
    }

    public function handlePlaceTypeId(): void
    {
        if ($this->application->position->place_type_id !== 0) {
            $repository = new PositionRepository();
            $this->place_type_groups = $repository->getUpdatedPlaceTypeGroups($this->application->position->place_type_id);
        } else {
            $this->place_type_groups = new Collection();
            $this->application->position->place_type_group_id = 0;
        }
    }

    public function handleRegionId(): void
    {
        if ($this->application->position->region_id !== 0) {
            $repository = new PositionRepository();
            $this->areas = $repository->getUpdatedAreas($this->application->position->region_id);
        } else {
            $this->areas = new Collection();
            $this->application->position->area_id = 0;
        }
    }
}
