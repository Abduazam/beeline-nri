<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms;

use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnRCU;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnTransport;
use App\Models\Positions\Position\Position;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnENode;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnModule;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnSector;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnAntenna;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnSetting;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnCabinets;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnDiapason;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnRadioModule;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnPowerSupplies;
use App\Http\Livewire\BaseStations\BaseStation\Forms\Traits\ActionOnSelectingData;

trait BaseStationCreateForm
{
    use ActionOnSelectingData, ActionOnSetting;
    use ActionOnDiapason, ActionOnPowerSupplies, ActionOnCabinets, ActionOnENode, ActionOnModule, ActionOnRadioModule, ActionOnSector, ActionOnAntenna, ActionOnRCU, ActionOnTransport;

    public string $action = 'store';

    public int $year = 0;
    public int $application_type_id;

    public int $position_id;
    public Position $position;
    public array $degree_values = [
        'latitude' => [
            'degree' => null,
            'minute' => null,
            'second' => null,
        ],
        'longitude' => [
            'degree' => null,
            'minute' => null,
            'second' => null,
        ]
    ];

    public array $data = [
        'diapasons' => [
            'chosen_diapasons' => [],
            'diapason_info' => [
                'room_type_id' => null,
                'hardware_room_id' => null,
                'hardware_owner_id' => null,
                'location_antenna_id' => null,
                'height_afu' => 0.0,
                'general_contractor' => [
                    'id' => null,
                    'name' => null,
                ],
                'type_ka' => null,
                'k_a_id' => null,
            ],
        ],
        'structures' => [
            'structure_type_id' => null,
            'structure_owner_id' => null,
            'height' => null,
            'structure_location_id' => null,
            'height_afu' => null,
            'height_rrl' => null,
        ],
        'ars' => [
            'lead_operator_id' => null,
            'infrastructure_owner_id' => null,
            'second_operator_number' => null,
            'contractor_for_reinforcement' => null,
            'rrl_response_part_id' => null,
            'rns_need_id' => null,
            'rns_result_id' => null,
            'strength_possibility_id' => null,
            'rental_agreement_id' => null,
            'electricity_specification_id' => null,
            'placement_specification_id' => null,
            'placement_required_id' => null,
            'financial_category_position_id' => null,
            'power_category_id' => null,
            'wind_farm_specification_id' => null,
            'energy_department_comment' => null,
            'number' => null,
            'power_backup' => null,
            'lighting_lights' => null,
            'additional_information' => null,
            'vehicle_cable_id' => null,
            'cabinets_number' => null,
        ],
        'power_supplies' => [],
        'cabinets' => [],
        'e_nodes' => [],
        'control_modules' => [],
        'radio_modules' => [],
        'sectors' => [],
        'antennas' => [],
        'mcus' => [],
        'rcus' => [],
        'transports' => [
            'link_to_prts' => null,
            'responsible_user_id' => null,
            'gfc_node' => null,
            'correct_id' => null,
            'networks' => [],
        ],
    ];

    protected array $rules = [
        'year' => 'required|numeric|gt:0',
        'application_type_id' => 'required|numeric|exists:application_types,id',
        'position_id' => 'required|numeric|exists:positions,id',
        // DIAPASONS
        'data.diapasons.chosen_diapasons' => 'required|array',
        'data.diapasons.chosen_diapasons.*.number' => 'required|numeric',
        'data.diapasons.chosen_diapasons.*.name' => 'required|string',
        'data.diapasons.chosen_diapasons.*.controller' => 'required|array',
        'data.diapasons.chosen_diapasons.*.controller.id' => 'required|numeric|exists:controllers,id',
        'data.diapasons.chosen_diapasons.*.controller.is_new' => 'nullable|boolean',
        'data.diapasons.diapason_info.room_type_id' => 'nullable|numeric|exists:room_types,id',
        'data.diapasons.diapason_info.hardware_room_id' => 'nullable|numeric|exists:hardware_rooms,id',
        'data.diapasons.diapason_info.hardware_owner_id' => 'nullable|numeric|exists:hardware_owners,id',
        'data.diapasons.diapason_info.location_antenna_id' => 'nullable|numeric|exists:location_antennas,id',
        'data.diapasons.diapason_info.height_afu' => 'nullable|numeric',
        'data.diapasons.diapason_info.general_contractor' => 'nullable|array',
        'data.diapasons.diapason_info.general_contractor.id' => 'nullable|numeric|exists:general_contractors,id',
        'data.diapasons.diapason_info.type_ka' => 'nullable|string',
        'data.diapasons.diapason_info.k_a_id' => 'nullable|numeric|exists:k_a_s,id',
        // STRUCTURES
        'data.structures.structure_type_id' => 'nullable|numeric|exists:structure_types,id',
        'data.structures.structure_owner_id' => 'nullable|numeric|exists:structure_owners,id',
        'data.structures.height' => 'nullable|numeric',
        'data.structures.structure_location_id' => 'nullable|numeric|exists:structure_locations',
        'data.structures.height_afu' => 'nullable|numeric',
        'data.structures.height_rrl' => 'nullable|numeric',
        // ARS
        'data.ars.lead_operator_id' => 'nullable|numeric|exists:lead_operators,id',
        'data.ars.infrastructure_owner_id' => 'nullable|numeric|exists:infrastructure_owners,id',
        'data.ars.second_operator_number' => 'nullable|string',
        'data.ars.contractor_for_reinforcement' => 'nullable|string',
        'data.ars.rrl_response_part_id' => 'nullable|numeric|exists:rrl_response_parts,id',
        'data.ars.rns_need_id' => 'nullable|numeric|exists:rns_needs,id',
        'data.ars.rns_result_id' => 'nullable|numeric|exists:rns_results,id',
        'data.ars.strength_possibility_id' => 'nullable|numeric|exists:strength_possibilities,id',
        'data.ars.rental_agreement_id' => 'nullable|numeric|exists:rental_agreements,id',
        'data.ars.electricity_specification_id' => 'nullable|numeric|exists:electricity_specifications,id',
        'data.ars.placement_specification_id' => 'nullable|numeric|exists:placement_specifications,id',
        'data.ars.placement_required_id' => 'nullable|numeric|exists:placement_requireds,id',
        'data.ars.financial_category_position_id' => 'nullable|numeric|exists:financial_category_positions,id',
        'data.ars.power_category_id' => 'nullable|numeric|exists:power_categories,id',
        'data.ars.wind_farm_specification_id' => 'nullable|numeric|exists:wind_farm_specifications,id',
        'data.ars.energy_department_comment' => 'nullable|string',
        'data.ars.number' => 'nullable|string',
        'data.ars.power_backup' => 'nullable|numeric',
        'data.ars.lighting_lights' => 'nullable|numeric',
        'data.ars.additional_information' => 'nullable|string',
        'data.ars.vehicle_cable_id' => 'nullable|numeric|exists:vehicle_cables,id',
        'data.ars.cabinets_number' => 'nullable|numeric',
        // POWER SUPPLIES
        'data.power_supplies' => 'nullable|array',
        'data.power_supplies.*' => 'nullable|array',
        'data.power_supplies.*.d' => 'nullable|string',
        'data.power_supplies.*.purpose' => 'nullable|string',
        'data.power_supplies.*.ip_type_id' => 'nullable|numeric|exists:ip_types,id',
        'data.power_supplies.*.ip_manufacturer_id' => 'nullable|numeric|exists:ip_manufacturers,id',
        'data.power_supplies.*.battery_type_id' => 'nullable|numeric|exists:battery_types,id',
        'data.power_supplies.*.power' => 'nullable|string',
        'data.power_supplies.*.voltage' => 'nullable|string',
        // CABINETS
        'data.cabinets' => 'nullable|array',
        'data.cabinets.*' => 'nullable|array',
        'data.cabinets.*.bts_type_id' => 'nullable|numeric|exists:bts_types,id',
        'data.cabinets.*.bts_number' => 'nullable|string',
        'data.cabinets.*.bs_name_nms' => 'nullable|string',
        'data.cabinets.*.transceivers_number' => 'nullable|numeric',
        'data.cabinets.*.e1_threads_number' => 'nullable|numeric',
        'data.cabinets.*.mb' => 'nullable|numeric',
        // E_NODES
        'data.e_nodes' => 'nullable|array',
        'data.e_nodes.*' => 'nullable|array',
        'data.e_nodes.*.e_node_b_id' => 'nullable|numeric',
        'data.e_nodes.*.diapason.id' => 'nullable|numeric|exists:diapasons,id',
        // CONTROL MODULES
        'data.control_modules' => 'nullable|array',
        'data.control_modules.*' => 'nullable|array',
        'data.control_modules.*.mu_type_id' => 'nullable|numeric|exists:mu_types,id',
        'data.control_modules.*.mu_number' => 'nullable|string',
        'data.control_modules.*.room_type_id' => 'nullable|numeric|exists:room_types,id',
        'data.control_modules.*.cabinet_id' => 'nullable|string',
        'data.control_modules.*.bs_name_nms' => 'nullable|string',
        // RADIO MODULES
        'data.radio_modules' => 'nullable|array',
        'data.radio_modules.*' => 'nullable|array',
        'data.radio_modules.*.rru_number' => 'nullable|string',
        'data.radio_modules.*.rru_type_id' => 'nullable|numeric|exists:rru_types,id',
        'data.radio_modules.*.sectors' => 'nullable|string',
        'data.radio_modules.*.control_module_id' => 'nullable|string',
        'data.radio_modules.*.transceivers' => 'nullable|numeric',
        'data.radio_modules.*.optical_cable_id' => 'nullable|numeric|exists:optical_cables,id',
        'data.radio_modules.*.optical_cable_number' => 'nullable|numeric',
        // SECTORS
        'data.sectors' => 'nullable|array',
        'data.sectors.*' => 'nullable|array',
        'data.sectors.*.rssh' => 'nullable|boolean',
        'data.sectors.*.sector_number' => 'nullable|numeric',
        'data.sectors.*.cell_id' => 'nullable|numeric',
        'data.sectors.*.diapason_id' => 'nullable|numeric',
        'data.sectors.*.title' => 'nullable|string',
        'data.sectors.*.e_node_b_id' => 'nullable|string',
        'data.sectors.*.transceivers' => 'nullable|numeric',
        'data.sectors.*.drate_transceivers' => 'nullable|numeric',
        'data.sectors.*.bts_id' => 'nullable|string',
        'data.sectors.*.rru_id' => 'nullable|string',
        'data.sectors.*.antenna_number' => 'nullable|string',
        'data.sectors.*.azimuth' => 'nullable|numeric',
        'data.sectors.*.metro' => 'nullable|boolean',
        'data.sectors.*.lna_availability' => 'nullable|string',
        'data.sectors.*.lna_type' => 'nullable|string',
        'data.sectors.*.lna_number' => 'nullable|string',
        'data.sectors.*.duplex_filter_id' => 'nullable|numeric|exists:duplex_filters,id',
        'data.sectors.*.duplex_filter_number' => 'nullable|string',
        // ANTENNAS
        'data.antennas' => 'nullable|array',
        'data.antennas.*' => 'nullable|array',
        'data.antennas.*.sectors' => 'nullable|string',
        'data.antennas.*.sector_number' => 'nullable|numeric',
        'data.antennas.*.antenna_type_id' => 'nullable|numeric|exists:antenna_types,id',
        'data.antennas.*.meta_article' => 'nullable|string',
        'data.antennas.*.top_antenna' => 'nullable|string',
        'data.antennas.*.azimuth' => 'nullable|numeric',
        'data.antennas.*.suspension_height' => 'nullable|numeric',
        'data.antennas.*.diapasons' => 'nullable|string',
        'data.antennas.*.direction_diagram' => 'nullable|string',
        'data.antennas.*.direction_diagram_2' => 'nullable|string',
        'data.antennas.*.ku_antennas' => 'nullable|string',
        'data.antennas.*.bisector' => 'nullable|boolean',
        'data.antennas.*.electrical_tilt' => 'nullable|string',
        'data.antennas.*.mechanical_tilt' => 'nullable|string',
        'data.antennas.*.sum_tilts' => 'nullable|string',
        'data.antennas.*.antenna_reception_id' => 'nullable|numeric|exists:antenna_receptions,id',
        'data.antennas.*.antenna_transmission_id' => 'nullable|numeric|exists:antenna_transmissions,id',
        'data.antennas.*.feeder_id' => 'nullable|numeric|exists:feeders,id',
        'data.antennas.*.feeder_length' => 'nullable|numeric',
        'data.antennas.*.latitude' => 'nullable|string',
        'data.antennas.*.longitude' => 'nullable|string',
        // RCUS
        'data.rcus' => 'nullable|array',
        'data.rcus.*' => 'nullable|array',
        'data.rcus.*.rru_control' => 'nullable|boolean',
        'data.rcus.*.antenna_id' => 'nullable|numeric',
        'data.rcus.*.antenna_type' => 'nullable|string',
        'data.rcus.*.sectors' => 'nullable|string',
        'data.rcus.*.number_mcu_rru' => 'nullable|string',
        'data.rcus.*.type_mcu_rru' => 'nullable|string',
        'data.rcus.*.motor_id' => 'nullable|numeric|exists:motors,id',
        'data.rcus.*.i_cable_id' => 'nullable|numeric|exists:i_cables,id',
        'data.rcus.*.o_cable_id' => 'nullable|numeric|exists:o_cables,id',
        // TRANSPORT NETWORKS
        'data.transports' => 'nullable|array',
        'data.transports.link_to_prts' => 'nullable|array',
        'data.transports.responsible_user_id' => 'nullable|numeric|exists:users,id',
        'data.transports.gfc_node' => 'nullable|string',
        'data.transports.correct_id' => 'nullable|boolean',
        'data.transports.networks' => 'nullable|array',
        'data.transports.networks.*' => 'nullable|array',
        'data.transports.networks.*.vehicle_type_id' => 'nullable|numeric|exists:vehicles_types,id',
        'data.transports.networks.*.position_set_id' => 'nullable|numeric|exists:position_sets,id',
        'data.transports.networks.*.line_status_id' => 'nullable|numeric|exists:line_statuses,id',
        'data.transports.networks.*.line_number' => 'nullable|string',
        'data.transports.networks.*.landowner' => 'nullable|string',
        'data.transports.networks.*.equipment_type_id' => 'nullable|numeric|exists:equipment_types,id',
        'data.transports.networks.*.interface' => 'nullable|string',
        'data.transports.networks.*.tdm_band' => 'nullable|string',
        'data.transports.networks.*.ip_band' => 'nullable|string',
        'data.transports.networks.*.generalization_frequency' => 'nullable|string',
        'data.transports.networks.*.speed' => 'nullable|string',
        'data.transports.networks.*.antenna_diameter_in_ta' => 'nullable|numeric',
        'data.transports.networks.*.antenna_diameter_in_ta_2' => 'nullable|numeric',
        'data.transports.networks.*.suspension_height_in_ta' => 'nullable|numeric',
        'data.transports.networks.*.suspension_height_in_ta_2' => 'nullable|numeric',
        'data.transports.networks.*.power' => 'nullable|string',
        'data.transports.networks.*.azimuth_a' => 'nullable|numeric',
        'data.transports.networks.*.reservation' => 'nullable|string',
        'data.transports.networks.*.node_code' => 'nullable|string',
        'data.transports.networks.*.response_title' => 'nullable|string',
        'data.transports.networks.*.item_code' => 'nullable|numeric|exists:positions,number',
        'data.transports.networks.*.response_kit' => 'nullable|string',
        'data.transports.networks.*.antenna_diameter_in_tb' => 'nullable|numeric',
        'data.transports.networks.*.antenna_diameter_in_tb_2' => 'nullable|numeric',
        'data.transports.networks.*.suspension_height_in_tb' => 'nullable|numeric',
        'data.transports.networks.*.suspension_height_in_tb_2' => 'nullable|numeric',
        'data.transports.networks.*.azimuth_b' => 'nullable|numeric',
        'data.transports.networks.*.change_date' => 'nullable|string',
        'data.transports.networks.*.range' => 'nullable|numeric',
    ];
}
