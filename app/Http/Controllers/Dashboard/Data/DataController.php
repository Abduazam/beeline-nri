<?php

namespace App\Http\Controllers\Dashboard\Data;

use App\Http\Controllers\Controller;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\Controllers\Controller as ControllerModel;
use App\Models\Data\Coordinate\CoordinateType;
use App\Models\Data\Diapason\Diapason;
use App\Models\Data\GeneralContractor\GeneralContractor;
use App\Models\Data\HardwareOwner\HardwareOwner;
use App\Models\Data\HardwareRoom\HardwareRoom;
use App\Models\Data\KA\KA;
use App\Models\Data\LocationAntenna\LocationAntenna;
use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceTypeGroup\PlaceTypeGroup;
use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\State\State;
use App\Models\Data\Position\Status\Status;
use App\Models\Data\Purpose\Purpose;
use App\Models\Data\RoomType\RoomType;
use App\Models\Data\Technology\Technology;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;

class DataController extends Controller
{
    /**
     * Show the data section dashboard.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('data section');
        return view('dashboard.data.index', [
            'place_types' => PlaceType::query()->count(),
            'place_type_groups' => PlaceTypeGroup::query()->count(),
            'purposes' => Purpose::query()->count(),
            'coordinate_types' => CoordinateType::query()->count(),
            'companies' => Company::query()->count(),
            'application_types' => ApplicationType::query()->count(),
            'statuses' => Status::query()->count(),
            'states' => State::query()->count(),
            'controllers' => ControllerModel::query()->count(),
            'technologies' => Technology::query()->count(),
            'diapasons' => Diapason::query()->count(),
            'room_types' => RoomType::query()->count(),
            'hardware_rooms' => HardwareRoom::query()->count(),
            'hardware_owners' => HardwareOwner::query()->count(),
            'location_antennas' => LocationAntenna::query()->count(),
            'general_contractors' => GeneralContractor::query()->count(),
            'k_as' => KA::query()->count(),
        ]);
    }
}
