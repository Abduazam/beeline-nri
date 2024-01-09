<?php

namespace App\Repository\Positions\Position;

use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Coordinate\CoordinateType;
use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\State\State;
use App\Models\Data\Position\Status\Status;
use App\Models\Data\Purpose\Purpose;
use App\Models\Positions\Position\Position;
use App\Models\Widget\TableColumnName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class PositionRepository
{
    public function getFiltered($regions, $areas, $company_id, $per_page, $status, $application_type_id, $search, $select_id, $column_name, $begin_date, $end_date, $orderBy, $orderDir)
    {
        $user = auth()->user();

        $region_ids = $user?->branches?->first()?->regions->pluck('id')->toArray();

        $positions = Position::select('*')
            ->with(['applications' => function ($query) use ($status, $application_type_id, $user) {
                if (isset($status) and $status !== 0) {
                    $query->where('status_id', $status);
                }
                if (isset($application_type_id) and $application_type_id !== 0) {
                    $query->where('application_type_id', $application_type_id);
                }

                if ($user->hasPermissionTo('accept position')) {
                    $acceptor_ids = $user->position_workflow->pluck('id')->toArray();

                    $query->whereIn('id', function ($query) use ($acceptor_ids) {
                        $query->select('position_application_id')
                            ->from('position_acceptors')
                            ->whereIn('workflow_id', $acceptor_ids);
                    });
                }
            }])
            ->whereHas('applications', function ($query) use ($user) {
                if ($user->hasPermissionTo('accept position')) {
                    $acceptor_ids = $user->position_workflow->pluck('id')->toArray();

                    $query->whereIn('id', function ($query) use ($acceptor_ids) {
                        $query->select('position_application_id')
                            ->from('position_acceptors')
                            ->whereIn('workflow_id', $acceptor_ids);
                    });
                }
            })
            ->when($region_ids, function ($query, $region_ids) {
                return $query->whereIn('region_id', $region_ids);
            })
            ->when($regions, function ($query, $regions) {
                return $query->whereIn('region_id', $regions);
            })
            ->when($areas, function ($query, $areas) {
                return $query->whereIn('area_id', $areas);
            })
            ->when($company_id, function ($query, $id) {
                return $query->where('company_id', $id);
            })
            ->when($search, function ($query, $search) use ($column_name) {
                return $query->where($column_name, 'like', '%' . $search . '%');
            })
            ->when($select_id, function ($query, $select_id) use ($column_name) {
                return $query->where($column_name, '=', $select_id);
            });
            //->when($begin_date, function ($query, $begin_date) {
            //    return $query->where('created_at', '>=', $begin_date);
            //})
            //->when($end_date, function ($query, $end_date) {
            //    $endOfDay = date('Y-m-d 23:59:59', strtotime($end_date));
            //    return $query->where('created_at', '<=', $endOfDay);
            //});

        $positions->orderBy($orderBy, $orderDir);

        return $per_page === 0 ? $positions->get() : $positions->paginate($per_page);
    }

    public function getRegions(): Collection|array
    {
        $user_branches = auth()->user()->branches->pluck('id')->toArray();

        return Region::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->whereIn('branch_id', $user_branches)
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

    public function getCompanies(): Collection|array
    {
        return Company::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })
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

    public function getColumnsName(): Collection|array
    {
        $table_name = 'positions';

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);
            $columnsToRemove = ['company_id', 'source', 'region_id', 'area_id', 'coordinate_id', 'created_at', 'updated_at', 'deleted_at'];
            $columns = array_diff($columns, $columnsToRemove);

            return TableColumnName::query()
                ->where('table_name', $table_name)
                ->where('locale', app()->getLocale())
                ->whereIn('column_name', $columns)
                ->get();
        }

        return [];
    }

    public function getPlaceTypes(): Collection|array
    {
        return PlaceType::query()
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })->get();
    }

    public function getPlaceTypeGroups(): Collection|array
    {
        return PlaceTypeGroup::query()
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

    public function getApplicationTypes(): Collection|array
    {
        return ApplicationType::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->where('for', 'position')->get();
    }

    public function getCoordinateTypes(): Collection|array
    {
        return CoordinateType::query()->get();
    }

    public function getUpdatedPlaceTypeGroups(int $place_type_id): Collection|array
    {
        return PlaceTypeGroup::query()
            ->with('type')
            ->withWhereHas('translations',  function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->when($place_type_id, function ($query, $place_type_id) {
                $query->where('place_type_groups.place_type_id', $place_type_id);
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
}
