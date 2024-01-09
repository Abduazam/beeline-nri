<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use Illuminate\Support\Facades\App;
use App\Models\Widget\TableColumnName;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Data\ApplicationType\ApplicationType;

class BaseStationRepository
{
    public function getRegions(): Collection|array
    {
        return Region::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->whereIn('branch_id', function ($query) {
                $query->select('id')->from('user_branches')
                    ->where('user_id', auth()->user()->id);
            })
            ->get();
    }

    public function getAreas(): Collection|array
    {
        $regions = $this->getRegions();

        return Area::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->whereIn('region_id', $regions->pluck('id'))
            ->get();
    }

    public function getColumnsName(): Collection|array
    {
        $table_name = 'base_stations';

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);
            $columnsToRemove = ['application_type', 'user_id', 'position_id', 'updated_at', 'deleted_at',];
            $columns = array_diff($columns, $columnsToRemove);

            return TableColumnName::query()
                ->where('table_name', $table_name)
                ->where('locale', app()->getLocale())
                ->whereIn('column_name', $columns)
                ->get();
        }

        return [];
    }

    public function getYears(): Collection
    {
        $currentYear = Carbon::now()->year;
        $nextYear = $currentYear + 1;
        $yearsCollection = new Collection();
        for ($year = $nextYear; $year >= ($nextYear - 22); $year--) {
            $yearsCollection->push($year);
        }

        return $yearsCollection;
    }

    public function getApplicationTypes(): Collection|array
    {
        return ApplicationType::query()
            ->where('for', 'base-station')
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }
}
