<?php

namespace App\Http\Livewire\Positions\Position\Forms;

use App\Helpers\Helper;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Positions\PositionApplications\PositionApplication;
use App\Repository\Positions\Position\PositionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

trait PositionEditTrait
{
    public string $action = 'send';

    public string $source;
    public int $company_id = 0;

    public Collection $place_type_groups;
    public int $place_type_id = 0;
    public int $place_type_group_id = 0;
    public int $purpose_id = 0;

    public Collection $areas;
    public int $region_id = 0;
    public ?int $area_id = null;
    public int $territory_id = 0;

    public string $name = '';
    public string $address = '';

    public int $coordinate_id = 0;
    public int $coordinate_type_id;

    public string $comment = '';

    protected array $rules = [
        'source' => ['required', 'string'],
        'company_id' => ['required', 'numeric', 'exists:companies,id'],
        'place_type_id' => ['required', 'numeric', 'exists:place_types,id'],
        'place_type_group_id' => ['required', 'numeric', 'exists:place_type_groups,id'],
        'purpose_id' => ['required', 'numeric', 'exists:purposes,id'],
        'region_id' => ['required', 'numeric', 'exists:regions,id'],
        'area_id' => ['nullable', 'numeric', 'exists:areas,id'],
        'territory_id' => ['required', 'numeric', 'exists:regions,id'],
        'name' => ['required', 'string'],
        'address' => ['nullable', 'string'],
        'coordinate_id' => ['required', 'numeric', 'exists:coordinate_types,id'],
        'coordinate_type_id' => ['required', 'numeric'],
        'coordinate_values' => ['required', 'array'],
        'coordinate_values.*' => ['required', 'array'],
        'coordinate_values.*.decimal' => ['required', 'numeric'],
        'degree_values' => ['required', 'array'],
        'degree_values.*' => ['required', 'array'],
        'degree_values.*.*' => ['required', 'numeric'],
        'comment' => ['string'],
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
        $this->source = $this->position->edits->source ?? $this->position->source;
        $this->company_id = $this->position->edits->company_id ?? $this->position->company_id;
        $this->place_type_id = $this->position->edits->place_type_id ?? $this->position->place_type_id;
        $this->place_type_group_id = $this->position->edits->place_type_group_id ?? $this->position->place_type_group_id;
        $this->purpose_id = $this->position->edits->purpose_id ?? $this->position->purpose_id;
        $this->region_id = $this->position->edits->region_id ?? $this->position->region_id;
        $this->area_id = $this->position->edits->area_id ?? $this->position->area_id;
        $this->territory_id = $this->position->edits->territory_id ?? $this->position->territory_id;
        $this->name = $this->position->edits->name ?? $this->position->name;
        $this->address = $this->position->edits->address ?? $this->position->address;
        $this->coordinate_id = $this->position->edits->coordinate_id ?? $this->position->coordinate_id;

        $repository = new PositionRepository();
        $this->place_type_groups = $repository->getUpdatedPlaceTypeGroups($this->place_type_id);
        $this->areas = $repository->getUpdatedAreas($this->region_id);
        $this->coordinate_type_id = $this->decimal;
        $this->coordinate_values['latitude']['decimal'] = $this->position->edits->latitude ?? $this->position->latitude;
        $this->coordinate_values['longitude']['decimal'] = $this->position->edits->longitude ?? $this->position->longitude;
        $this->handleUpdatedProperty('latitude.decimal', new Helper());
        $this->handleUpdatedProperty('longitude.decimal', new Helper());
        $application_type = ApplicationType::where('aim', 'edit')->first();
        $application = PositionApplication::where('position_id', $this->position->id)->where('application_type_id', $application_type->id)->first();
        if ($application) {
            $this->comment = $application->comment;
        }
    }

    public function handlePlaceTypeId(): void
    {
        if ($this->place_type_id !== 0) {
            $repository = new PositionRepository();
            $this->place_type_groups = $repository->getUpdatedPlaceTypeGroups($this->place_type_id);
        } else {
            $this->place_type_groups = new Collection();
            $this->place_type_group_id = 0;
        }
    }

    public function handleRegionId(): void
    {
        if ($this->region_id !== 0) {
            $repository = new PositionRepository();
            $this->areas = $repository->getUpdatedAreas($this->region_id);
        } else {
            $this->areas = new Collection();
            $this->area_id = 0;
        }
    }
}
