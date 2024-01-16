<?php

namespace App\Http\Livewire\BaseStations\BaseStation;

use Throwable;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Services\BaseStations\BaseStation\Create\CreateService;
use App\Services\BaseStations\BaseStation\Archive\ArchiveService;
use App\Http\Livewire\BaseStations\BaseStation\Forms\BaseStationCreateForm;

class Create extends Component
{
    use BaseStationCreateForm;

    protected $listeners = [
        'positionChosen' => 'setPosition',
        'controllerChosen' => 'setController',
        'generalContractorChosen' => 'setGeneralContractor',
        'cabinetBtsTypeChosen' => 'setCabinetBtsType',
        'controlModuleMuTypeChosen' => 'setControlModuleMuType',
        'radioModuleRruTypeChosen' => 'setRadioModuleRruType',
        'antennaSectorsChosen' => 'setAntennaSectors',
        'antennaTypeChosen' => 'setAntennaType',
        'motorChosen' => 'setMotor',
        'iCableChosen' => 'setICable',
        'oCableChosen' => 'setOCable',
        'equipmentTypeChosen' => 'setEquipmentType',
        'networkPositionChosen' => 'setNetworkPositionNumber',
    ];

    public function mount(): void
    {
        $this->application_type_id = $this->getApplicationTypes()->first()->id;
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @throws Throwable
     */
    public function submitForm()
    {
        try {
            $validatedData = $this->validate();

            if ($this->action === 'store') {
                $service = new CreateService();
                $service->create($validatedData);

                return redirect()->route('base-stations.base-station.index');
            } elseif ($this->action === 'archive') {
                $service = new ArchiveService();
                $base_stations = $service->archive($validatedData);

                return redirect()->route('base-stations.base-station.edit', $base_stations);
            }
        } catch (ValidationException $e) {
            $errorMessages = [];

            // Iterate through error messages and store them in an array
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $errorMessages[] = $message;
            }

            // Concatenate error messages into a single string
            $errorMessageString = implode("<br>", $errorMessages);

            // Flash an alert message to the session with all error messages
            return redirect()->back()->with('alert', 'Проверка не удалась: <br>' . $errorMessageString)->withErrors($e->validator->getMessageBag());
        }
    }

    public function render(): View
    {
        return view('livewire.base-stations.base-station.create', [
            'years' => $this->generateYears(),
            'application_types' => $this->getApplicationTypes(),
            'diapasons' => $this->getDiapasons(),
            'room_types' => $this->getRoomTypes(),
            'hardware_rooms' => $this->getHardwareRooms(),
            'hardware_owners' => $this->getHardwareOwners(),
            'location_antennas' => $this->getLocationAntennas(),
            'k_as' => $this->getKas(),
            'lead_operators' => $this->getLeadOperators(),
            'infrastructure_owners' => $this->getInfrastructureOwners(),
            'rrl_response_parts' => $this->getRrlResponseParts(),
            'rns_needs' => $this->getRnsNeeds(),
            'rns_results' => $this->getRnsResults(),
            'strength_possibilities' => $this->getStrengthPossibilities(),
            'rental_agreements' => $this->getRentalAgreements(),
            'electricity_specifications' => $this->getElectricitySpecifications(),
            'placement_specifications' => $this->getPlacementSpecifications(),
            'placement_requireds' => $this->getPlacementRequireds(),
            'financial_category_positions' => $this->getFinancialCategoryPositions(),
            'power_categories' => $this->getPowerCategories(),
            'wind_farm_specifications' => $this->getWindFarmSpecifications(),
            'vehicle_cables' => $this->getVehicleCables(),
            'ip_types' => $this->getIpTypes(),
            'ip_manufacturers' => $this->getIpManufacturers(),
            'battery_types' => $this->getBatteryTypes(),
            'optical_cables' => $this->getOpticalCables(),
            'duplex_filters' => $this->getDuplexFilters(),
            'antenna_receptions' => $this->getAntennaReception(),
            'antenna_transmissions' => $this->getAntennaTransmissions(),
            'feeders' => $this->getFeeders(),
            'vehicles' => $this->getVehicleTypes(),
            'position_sets' => $this->getPositionSets(),
            'line_statuses' => $this->getLineStatuses(),
        ]);
    }
}
