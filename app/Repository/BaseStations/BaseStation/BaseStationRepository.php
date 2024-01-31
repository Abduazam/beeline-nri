<?php

namespace App\Repository\BaseStations\BaseStation;

use App\Models\Area\Region\Region;
use App\Models\BaseStations\BaseStation\BaseStation;
use App\Models\Data\ApplicationType\ApplicationType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;

class BaseStationRepository
{
    public function getFiltered($search, $per_page, $orderBy, $orderDir): Collection|LengthAwarePaginator|array
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $region_ids = Region::pluck('id')->toArray();
        } else {
            $region_ids = $user->branches->flatMap(function ($branch) {
                return $branch->regions->pluck('id');
            })->toArray();
        }

        $base_stations = BaseStation::with('position', 'applications')
            ->whereHas('position', function ($positionQuery) use ($region_ids) {
                $positionQuery->whereIn('region_id', $region_ids);
            })
            ->when($search, function ($query, $search) {
                return $query->whereHas('position', function ($positionQuery) use ($search) {
                    $positionQuery->where('number', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                });
            });

        $base_stations->orderBy($orderBy, $orderDir);

        return $per_page === 0 ? $base_stations->get() : $base_stations->paginate($per_page);
    }

    public function getApplicationTypes(): Collection|array
    {
        return ApplicationType::query()
            ->withWhereHas('translations', function ($query) {
                $query->where('locale', App::getLocale());
            })
            ->where('for', 'base-station')->get();
    }
}
