<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Traits;

trait BaseStationFilterTrait
{
    public bool $region_id = true;
    public bool $area_id = true;
    public array $chosen_regions = [];
    public array $chosen_areas = [];

    public int $status = 0;
    public int $state = 0;
    public int $application_type_id = 1;

    public string $search = '';
}
