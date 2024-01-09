<?php

namespace App\Http\Livewire\Positions\Position\Forms;

use App\Models\Data\Coordinate\CoordinateType;
use App\Models\Data\Position\Company\Company;
use App\Repository\Positions\Position\PositionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

trait PositionCreateForm
{
    public string $action = 'store';

    public string $source = "NRI (Network Resource Inventory)";
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
        $this->company_id = (Company::first())->id;
        $this->coordinate_id = (CoordinateType::first())->id;
        $this->coordinate_type_id = $this->decimal;
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
