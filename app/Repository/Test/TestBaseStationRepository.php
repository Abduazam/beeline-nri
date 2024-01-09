<?php

namespace App\Repository\Test;

use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use App\Models\Test\TestBaseStation;
use App\Models\Widget\TableColumnName;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class TestBaseStationRepository
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

    public function getBaseStations($search, $column_name,  ?string $begin_date, ?string $end_date)
    {
        return TestBaseStation::query()
            ->when($search, function ($query, $search) use ($column_name) {
                $query->where($column_name, 'like', '%' . $search . '%');
            })
            ->when($begin_date, function ($query, $begin_date) {
                return $query->where('created_at', '>=', $begin_date);
            })
            ->when($end_date, function ($query, $end_date) {
                $endOfDay = date('Y-m-d 23:59:59', strtotime($end_date));
                return $query->where('created_at', '<=', $endOfDay);
            });
    }
}
