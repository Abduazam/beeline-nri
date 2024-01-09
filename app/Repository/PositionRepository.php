<?php

namespace App\Repository;

use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Coordinate\CoordinateType;
use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Position\State\State;
use App\Models\Data\Position\Status\Status;
use App\Models\Data\Purpose\Purpose;
use App\Models\Widget\TableColumnName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class PositionRepository
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

    public function getStatuses(): Collection|array
    {
        return Status::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getStates(): Collection|array
    {
        return State::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getApplicationTypes(): Collection|array
    {
        return ApplicationType::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getColumnsName(): Collection|array
    {
        $table_name = 'positions';

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);
            $columnsToRemove = ['application_type', 'company', 'source', 'region_id', 'area_id', 'status_id', 'updated_at', 'deleted_at', 'user_id', 'coordinate_id'];
            $columns = array_diff($columns, $columnsToRemove);

            return TableColumnName::query()
                ->where('table_name', $table_name)
                ->where('locale', app()->getLocale())
                ->whereIn('column_name', $columns)
                ->get();
        }

        return [];
    }

    public function getPlacedTypes(): Collection|array
    {
        return PlaceType::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getPurposes(): Collection|array
    {
        return Purpose::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getTerritories(): Collection|array
    {
        return Region::query()
            ->with('branch')
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getCoordinates(): Collection|array
    {
        return CoordinateType::query()->get();
    }

    public function getGroups(): Collection|array
    {
        return PlaceTypeGroup::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getUpdatedGroups(int $type_id): Collection|array
    {
        return PlaceTypeGroup::query()
            ->with('type')
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($type_id, function ($query, $type_id) {
                $query->where('placed_type_groups.type_id', $type_id);
            })->get();
    }

    public function getUpdatedAreas(int $region_id): Collection|array
    {
        return Area::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($region_id, function ($query, $region_id) {
                $query->where('region_id', $region_id);
            })->get();
    }

    public function getCreatorPositions(int $position_status, array $chosen_regions, array $chosen_areas, string $company, string $search, string $column_name, int $select_id, ?string $begin_date, ?string $end_date, $user)
    {
        return Position::query()
            ->when($position_status, function ($query, $status_id) {
                return $query->where('status_id', $status_id);
            })
            ->when($chosen_regions, function ($query, $regions) {
                return $query->whereIn('region_id', $regions);
            })
            ->when($chosen_areas, function ($query, $areas) {
                return $query->whereIn('area_id', $areas);
            })
            ->when($company, function ($query, $company) {
                return $query->where('company', $company);
            })
            ->when($search, function ($query, $search) use ($column_name) {
                return $query->where($column_name, 'like', '%' . $search . '%');
            })
            ->when($select_id, function ($query, $select_id) use ($column_name) {
                return $query->where($column_name, '=', $select_id);
            })
            ->when($begin_date, function ($query, $begin_date) {
                return $query->where('created_at', '>=', $begin_date);
            })
            ->when($end_date, function ($query, $end_date) {
                $endOfDay = date('Y-m-d 23:59:59', strtotime($end_date));
                return $query->where('created_at', '<=', $endOfDay);
            })
            ->where('user_id', $user->id);
    }

    public function getAcceptorPositions(int $position_status, array $chosen_regions, array $chosen_areas, string $company, string $search, string $column_name, int $select_id, ?string $begin_date, ?string $end_date, $user)
    {
        return Position::query()
            ->select('positions.*')
            ->join('position_accepts', 'positions.id', '=', 'position_accepts.position_id')
            ->join('position_workflows', 'position_accepts.workflow_id', '=','position_workflows.id')
            ->join('position_workflow_users', 'position_workflows.id', '=', 'position_workflow_users.step_id')
            ->where('position_workflow_users.user_id', $user->id)
            ->when($position_status, function ($query, $status_id) {
                return $query->where('status_id', $status_id);
            })
            ->when($chosen_regions, function ($query, $regions) {
                return $query->whereIn('region_id', $regions);
            })
            ->when($chosen_areas, function ($query, $areas) {
                return $query->whereIn('area_id', $areas);
            })
            ->when($company, function ($query, $company) {
                return $query->where('company', $company);
            })
            ->when($search, function ($query, $search) use ($column_name) {
                $query->where($column_name, 'like', '%' . $search . '%');
            })
            ->when($select_id, function ($query, $select_id) use ($column_name) {
                return $query->where($column_name, '=', $select_id);
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
