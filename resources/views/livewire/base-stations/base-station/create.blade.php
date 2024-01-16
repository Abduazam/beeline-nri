<div class="content">
    <div class="block-content p-0">
        <form wire:submit.prevent="submitForm">
            <div id="base-station-info" role="tablist" aria-multiselectable="true">
                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-position-info">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-position-info-block" aria-expanded="true" aria-controls="base-station-position-info-block">{{ \App\Models\Widget\TextName::getTextTranslation('base-station-position-info') }}</a>
                    </div>
                    <div id="base-station-position-info-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-position-info">
                        <div class="block-content">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <label for="year" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_stations', 'year') }} <x-texts.required-sign />:</label>
                                    <select wire:model="year" name="year" id="year" class="form-select form-select-sm w-auto">
                                        <option value="0" disabled></option>
                                        @foreach($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('year')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <label for="application_type_id" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_applications', 'application_type_id') }} <x-texts.required-sign />:</label>
                                    <select wire:model="application_type_id" name="application_type_id" id="application_type_id" class="form-select form-select-sm w-auto">
                                        @foreach($application_types as $application_type)
                                            <option value="{{ $application_type->id }}">{{ $application_type->translations[0]->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('application_type_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                    <livewire:base-stations.base-station.components.choose-position />
                                    @error('position_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr class="opacity-100">
                                <div class="position-info-block px-0">
                                    <div class="row w-100 h-100 mx-0 p-0">
                                        <div class="w-auto mb-3">
                                            <label for="position_region" class="form-label">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'region_id') }}:</label>
                                            <input name="position_region" id="position_region" class="form-control form-control-sm w-auto" value="{{ $position?->region->translations[0]->name }}" readonly disabled>
                                        </div>
                                        <div class="w-auto mb-3">
                                            <label for="position_area" class="form-label">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'area_id') }}:</label>
                                            <input name="position_area" id="position_area" class="form-control form-control-sm w-auto" value="{{ $position?->area?->translations[0]->name }}" readonly disabled>
                                        </div>
                                        <div class="col-12 d-flex align-items-center mb-3">
                                            <label for="position_address" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'address') }}:</label>
                                            <input name="position_address" id="position_address" class="form-control form-control-sm w-100" value="{{ $position?->address }}" readonly disabled>
                                        </div>
                                        <div class="col-6 d-flex align-items-center mb-3">
                                            <label for="base_station_name" class="form-label text-nowrap mb-0 me-3">{{ \App\Models\Widget\TextName::getTextTranslation('base-station-name') }}:</label>
                                            <input name="base_station_name" id="base_station_name" class="form-control form-control-sm w-100" value="{{ $position?->name }}" readonly disabled>
                                        </div>
                                        <div class="col-6 d-flex align-items-center mb-3">
                                            <label for="position_name" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }}:</label>
                                            <input name="position_name" id="position_name" class="form-control form-control-sm w-100" value="{{ $position?->name }}" readonly disabled>
                                        </div>
                                        <div class="col-12 d-flex align-items-center">
                                            <div class="col-lg-5 d-flex align-items-center mb-4">
                                                <label class="form-label mb-0 me-3" for="coordinate_id">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-system') }}: <x-texts.required-sign /></label>
                                                <input name="position_region" id="position_region" class="form-control form-control-sm w-auto" value="{{ $position?->coordinate->name }}" readonly disabled>
                                            </div>
                                            <div class="col-lg-7 mb-4">
                                                <div class="row w-100 m-0 p-0">
                                                    <div class="col-6 d-flex align-items-center">
                                                        <label class="col-form-label col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'latitude') }}: <span class="text-danger ms-1">*</span></label>
                                                        <div class="col-8">
                                                            <div class="col-12 mb-1">
                                                                <label class="w-100 d-flex justify-content-between">
                                                                    <label class="col-3">
                                                                        <input type="number" class="form-control form-control-sm" value="{{ $degree_values['latitude']['degree'] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">°</span>
                                                                    </label>
                                                                    <label class="col-3">
                                                                        <input type="number" class="form-control form-control-sm" value="{{ $degree_values['latitude']['minute'] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">'</span>
                                                                    </label>
                                                                    <label class="col-4">
                                                                        <input type="number" class="form-control form-control-sm" value="{{ $degree_values['latitude']['second'] }}" readonly disabled>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="w-100">
                                                                    <input step="any" type="number" class="form-control form-control-sm" value="{{ $position?->latitude }}" readonly disabled>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <label class="col-form-label col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'longitude') }}: <span class="text-danger ms-1">*</span></label>
                                                        <div class="col-8">
                                                            <div class="col-12 mb-1">
                                                                <label class="w-100 d-flex justify-content-between">
                                                                    <label class="col-3">
                                                                        <input type="number" class="form-control form-control-sm" value="{{ $degree_values['longitude']['degree'] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">°</span>
                                                                    </label>
                                                                    <label class="col-3">
                                                                        <input type="number" class="form-control form-control-sm" value="{{ $degree_values['longitude']['minute'] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">'</span>
                                                                    </label>
                                                                    <label class="col-4">
                                                                        <input type="number" class="form-control form-control-sm" value="{{ $degree_values['longitude']['second'] }}" readonly disabled>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="w-100">
                                                                    <input step="any" type="number" class="form-control form-control-sm" value="{{ $position?->longitude }}" readonly disabled>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm p-0">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-position-diapasons">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-position-diapasons-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">{{ \App\Models\Widget\TextName::getTextTranslation('diapasons') }}</a>
                    </div>
                    <div id="base-station-position-diapasons-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-position-diapasons">
                        <div class="block-content">
                            <div class="row w-100 h-100 p-0 mx-0">
                                <div class="col-12 d-flex align-items-center justify-content-between mb-2">
                                    @foreach($diapasons as $technology)
                                        @foreach($technology->diapasons as $diapason)
                                            <div class="form-check">
                                                <input wire:change="changeDiapason({{ $diapason->id }}, '{{ $technology->name . ' ' . $diapason->band }}')" class="form-check-input" type="checkbox" id="{{ $technology->name }}-{{ $diapason->band }}" name="{{ $technology->name }}-{{ $diapason->band }}" @if(is_null($position_id)) disabled @endif>
                                                <label class="form-check-label" for="{{ $technology->name }}-{{ $diapason->band }}">{{ $technology->name }} {{ $diapason->band }}</label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                            <tr>
                                                <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_diapasons', 'number') }}</th>
                                                <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_diapasons', 'diapason_id') }}</th>
                                                <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_diapasons', 'controller_id') }}</th>
                                                <th class="text-center">Расположение <br> контроллер</th>
                                                <th class="text-center">Событие АП</th>
                                                <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_diapasons', 'is_new') }}</th>
                                                <th class="text-center">Вид работы</th>
                                                <th class="text-center">ПРС</th>
                                                <th class="text-center">Причина <br> нарушения срока <br> интеграции</th>
                                                <th class="text-center">Номер АП ARS</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($this->data["diapasons"]["chosen_diapasons"] as $id => $diapason)
                                                <tr wire:key="diapason-row-{{ $id }}">
                                                    <td class="text-center">
                                                        <label for="{{ $diapason['name'] }}">
                                                            <input wire:model="data.diapasons.chosen_diapasons.{{ $id }}.number" type="text" class="form-control form-control-sm" name="{{ $diapason['name'] }}" id="{{ $diapason['name'] }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">{{ $diapason['name'] }}</td>
                                                    <td class="text-center">
                                                        <livewire:base-stations.base-station.components.choose-controller :diapason_id="$id" :wire:key="'choose-controller-' . $id" />
                                                    </td>
                                                    <td class="text-center">
                                                        <span>{{ $diapason['controller']['address'] }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="">
                                                            <select class="form-select form-select-sm" name="" id="" disabled>
                                                                <option value="">Не установлено</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label>
                                                            <input wire:model="data.diapasons.chosen_diapasons.{{ $id }}.controller.is_new" class="form-check-input" type="checkbox" value="{{ true }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="">
                                                            <select class="form-select form-select-sm" name="" id="" disabled>
                                                                <option value=""></option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="">
                                                            <select class="form-select form-select-sm" name="" id="" disabled>
                                                                <option value="">Не в плане</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="text-primary">Не указано</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="">
                                                            <select class="form-select form-select-sm" name="" id="" disabled>
                                                                <option value="">Не установлено</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-dark opacity-100 w-100 h-100">
                            <div class="row w-100 h-100 p-0 mx-0">
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="room_type_id" class="form-label">Тип помещения:</label>
                                    <select wire:model="data.diapasons.diapason_info.room_type_id" name="room_type_id" id="room_type_id" class="form-select form-select-sm w-100">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($room_types as $room_type)
                                            <option value="{{ $room_type->id }}">{{ $room_type->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('data.diapasons.diapason_info.room_type_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="hardware_room_id" class="form-label">Место размещения аппаратной:</label>
                                    <select wire:model="data.diapasons.diapason_info.hardware_room_id" name="hardware_room_id" id="hardware_room_id" class="form-select form-select-sm w-100">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($hardware_rooms as $hardware_room)
                                            <option value="{{ $hardware_room->id }}">{{ $hardware_room->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('data.diapasons.diapason_info.hardware_room_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="hardware_owner_id" class="form-label">Совместная аппаратная владелец:</label>
                                    <select wire:model="data.diapasons.diapason_info.hardware_owner_id" name="hardware_owner_id" id="hardware_owner_id" class="form-select form-select-sm w-100">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($hardware_owners as $hardware_owner)
                                            <option value="{{ $hardware_owner->id }}">{{ $hardware_owner->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('data.diapasons.diapason_info.hardware_owner_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="location_antenna_id" class="form-label">Место размещ. антенн:</label>
                                    <select wire:model="data.diapasons.diapason_info.location_antenna_id" name="location_antenna_id" id="location_antenna_id" class="form-select form-select-sm w-100">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($location_antennas as $location_antenna)
                                            <option value="{{ $location_antenna->id }}">{{ $location_antenna->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('data.diapasons.diapason_info.location_antenna_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="height_afu" class="form-label">Высота объекта размещ. АФУ, м:</label>
                                    <input type="number" wire:model="data.diapasons.diapason_info.height_afu" step="any" name="height_afu" id="height_afu" class="form-control form-control-sm w-100">
                                    @error('height_afu')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="general_contractor_id" class="form-label">Генеральный подрядчик:</label>
                                    <div class="row justify-content-between w-100 p-0 m-0">
                                        <input type="text" wire:model="data.diapasons.diapason_info.general_contractor.name" step="any" name="general_contractor_id" id="general_contractor_id" class="form-control form-control-sm w-75">
                                        <livewire:base-stations.base-station.components.choose-general-contractor />
                                    </div>
                                    @error('data.diapasons.diapason_info.general_contractor.name')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="type_ka" class="form-label">Тип К/А:</label>
                                    <input type="text" wire:model="data.diapasons.diapason_info.type_ka" step="any" name="type_ka" id="type_ka" class="form-control form-control-sm w-100">
                                    @error('data.diapasons.diapason_info.type_ka')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="k_a_id" class="form-label">К/А:</label>
                                    <select wire:model="data.diapasons.diapason_info.k_a_id" name="k_a_id" id="k_a_id" class="form-select form-select-sm w-100">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($k_as as $k_a)
                                            <option value="{{ $k_a->id }}">{{ $k_a->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('data.diapasons.diapason_info.k_a_id')
                                    <span class="text-danger ms-2 small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-structure">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-structure-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Характеристики высотного сооружения
                        </a>
                    </div>
                    <div id="base-station-structure-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-structure">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Тип</th>
                                                    <th class="text-center">Чие соружения</th>
                                                    <th class="text-center">Высота</th>
                                                    <th class="text-center">Место размещения </th>
                                                    <th class="text-center">Высота подвеса АФУ для поиска</th>
                                                    <th class="text-center">Высота подвеса РРЛ для поиска</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="structure_type_id">
                                                            <select wire:model="data.structures.structure_type_id" class="form-select form-select-sm" name="structure_type_id" id="structure_type_id" disabled>
                                                                <option value="null">Не установлено</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="structure_owner_id">
                                                            <select wire:model="data.structures.structure_owner_id" class="form-select form-select-sm" name="structure_owner_id" id="structure_owner_id" disabled>
                                                                <option value="null">Не установлено</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="height">
                                                            <input wire:model="data.structures.height" class="form-control form-control-sm w-auto" name="height" id="height"  type="text" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="structure_location_id">
                                                            <select wire:model="data.structures.structure_location_id" class="form-select form-select-sm" name="structure_location_id" id="structure_location_id" disabled>
                                                                <option value="null">Не установлено</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="height_afu">
                                                            <input wire:model="data.structures.height_afu" type="number" class="form-control form-control-sm w-auto" name="height_afu" id="height_afu" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="height_rrl">
                                                            <input wire:model="data.structures.height_rrl" type="number" class="form-control form-control-sm w-auto" name="height_rrl" id="height_rrl" disabled>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-structure-ars">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-structure-ars-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Характеристики объекта ARS
                        </a>
                    </div>
                    <div id="base-station-structure-ars-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-structure-ars">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Ведущий оператор</th>
                                                    <th class="text-center">Владелец инфраструктуры</th>
                                                    <th class="text-center">Номер второго оператор</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="lead_operator_id" class="w-100">
                                                            <select wire:model="data.ars.lead_operator_id" class="form-select form-select-sm w-100" name="lead_operator_id" id="lead_operator_id">
                                                                <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                                                @foreach($lead_operators as $lead_operator)
                                                                    <option value="{{ $lead_operator->id }}">{{ $lead_operator->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="infrastructure_owner_id" class="w-100">
                                                            <select wire:model="data.ars.infrastructure_owner_id" class="form-select form-select-sm w-100" name="infrastructure_owner_id" id="infrastructure_owner_id">
                                                                <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                                                @foreach($infrastructure_owners as $infrastructure_owner)
                                                                    <option value="{{ $infrastructure_owner->id }}">{{ $infrastructure_owner->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="second_operator_number" class="w-100 px-5">
                                                            <input wire:model="data.ars.second_operator_number" type="text" class="form-control form-control-sm w-100" id="second_operator_number" name="second_operator_number">
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr class="bg-dark opacity-100 w-100 h-100">
                                <div class="col-md-3 mb-4">
                                    <label for="contractor_for_reinforcement" class="form-label">Подрядчик для работ по усилениям:</label>
                                    <input wire:model="data.ars.contractor_for_reinforcement" type="text" class="form-control form-control-sm w-100" step="any" name="contractor_for_reinforcement" id="contractor_for_reinforcement">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rrl_response_part_id" class="form-label">Усиление ответной части РРЛ:</label>
                                    <select wire:model="data.ars.rrl_response_part_id" class="form-select form-select-sm w-100" name="rrl_response_part_id" id="rrl_response_part_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($rrl_response_parts as $rrl_response_part)
                                            <option value="{{ $rrl_response_part->id }}">{{ $rrl_response_part->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rns_need_id" class="form-label">Необходимость усиления РНС:</label>
                                    <select wire:model="data.ars.rns_need_id" class="form-select form-select-sm w-100" name="rns_need_id" id="rns_need_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($rns_needs as $rns_need)
                                            <option value="{{ $rns_need->id }}">{{ $rns_need->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rns_result_id" class="form-label">Результат РНС:</label>
                                    <select wire:model="data.ars.rns_result_id" class="form-select form-select-sm w-100" name="rns_result_id" id="rns_result_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($rns_results as $rns_result)
                                            <option value="{{ $rns_result->id }}">{{ $rns_result->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="strength_possibility_id" class="form-label">Возможность усиления:</label>
                                    <select wire:model="data.ars.strength_possibility_id" class="form-select form-select-sm w-100" name="strength_possibility_id" id="rns_result_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($rns_results as $rns_result)
                                            <option value="{{ $rns_result->id }}">{{ $rns_result->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rental_agreement_id" class="form-label">Наличие договора аренды:</label>
                                    <select wire:model="data.ars.rental_agreement_id" class="form-select form-select-sm w-100" name="rental_agreement_id" id="rental_agreement_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($rental_agreements as $rental_agreement)
                                            <option value="{{ $rental_agreement->id }}">{{ $rental_agreement->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="electricity_specification_id" class="form-label">Наличие ТУ на электроэнергию:</label>
                                    <select wire:model="data.ars.electricity_specification_id" class="form-select form-select-sm w-100" name="electricity_specification_id" id="electricity_specification_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($electricity_specifications as $electricity_specification)
                                            <option value="{{ $electricity_specification->id }}">{{ $electricity_specification->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="placement_specification_id" class="form-label">Наличие ТУ на размещение:</label>
                                    <select wire:model="data.ars.placement_specification_id" class="form-select form-select-sm w-100" name="placement_specification_id" id="placement_specification_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($placement_specifications as $placement_specification)
                                            <option value="{{ $placement_specification->id }}">{{ $placement_specification->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="placement_required_id" class="form-label">Требуются ТУ на размещение:</label>
                                    <select wire:model="data.ars.placement_required_id" name="placement_required_id" id="placement_required_id" class="form-select form-select-sm w-100">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($placement_requireds as $placement_required)
                                            <option value="{{ $placement_required->id }}">{{ $placement_required->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="financial_category_position_id" class="form-label">Финансовая категория позиции:</label>
                                    <select wire:model="data.ars.financial_category_position_id" name="financial_category_position_id" id="financial_category_position_id" class="form-select form-select-sm w-100">
                                        <option value="null">не установлен</option>
                                        @foreach($financial_category_positions as $financial_category_position)
                                            <option value="{{ $financial_category_position->id }}">{{ $financial_category_position->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="power_category_id" class="form-label">Категория электропитания</label>
                                    <select wire:model="data.ars.power_category_id" class="form-select form-select-sm w-100" name="power_category_id" id="power_category_id">
                                        <option value="null">не установлен</option>
                                        @foreach($power_categories as $power_category)
                                            <option value="{{ $power_category->id }}">{{ $power_category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="wind_farm_specification_id" class="form-label">Необходимость получения ТУ на ВЭС:</label>
                                    <select wire:model="data.ars.wind_farm_specification_id" class="form-select form-select-sm w-100" name="wind_farm_specification_id" id="wind_farm_specification_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($wind_farm_specifications as $wind_farm_specification)
                                            <option value="{{ $wind_farm_specification->id }}">{{ $wind_farm_specification->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="energy_department_comment" class="form-label">Комментарий отдела энергетики:</label>
                                    <textarea wire:model="data.ars.energy_department_comment" class="form-control form-control-sm w-100" name="energy_department_comment" id="energy_department_comment" cols="30" rows="2"></textarea>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="number" class="form-label">Номер РО:</label>
                                    <input wire:model="data.ars.number" class="form-control form-control-sm w-100" name="number" id="number" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="col-12 mb-2">
                                        <label class="form-label" for="power_backup">Наличие осветительных огней</label>
                                        <input wire:model="data.ars.power_backup" type="checkbox" class="form-check-input float-end" id="power_backup" name="power_backup" value="1">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="lighting_lights">Наличие резервирования питания</label>
                                        <input wire:model="data.ars.lighting_lights" type="checkbox" class="form-check-input float-end" name="lighting_lights" id="lighting_lights" value="1">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="additional_information" class="form-label">Дополнительная информация:</label>
                                    <textarea wire:model="data.ars.additional_information" class="form-control form-control-sm w-100" name="additional_information" id="additional_information" cols="30" rows="2"></textarea>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="vehicle_cable_id" class="form-label">Волновое сопротивление кабелей к ТС:</label>
                                    <select wire:model="data.ars.vehicle_cable_id" class="form-select form-select-sm w-100" name="vehicle_cable_id" id="vehicle_cable_id">
                                        <option value="null" disabled>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($vehicle_cables as $vehicle_cable)
                                            <option value="{{ $vehicle_cable->id }}">{{ $vehicle_cable->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="cabinets_number" class="form-label">Количество радио-шкафов (кабинетов, стоек):</label>
                                    <input wire:model="data.ars.cabinets_number" class="form-control form-control-sm w-100" name="cabinets_number" id="cabinets_number">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-power-supplies">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-power-supplies-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Источники питания
                        </a>
                    </div>
                    <div id="base-station-power-supplies-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-power-supplies">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a wire:click="addPowerSupply" class="btn btn-sm btn-alt-primary" >
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th class="text-center">Д</th>
                                                    <th class="text-center">Назначение</th>
                                                    <th class="text-center">Тип ИП</th>
                                                    <th class="text-center">Производитель ИП </th>
                                                    <th class="text-center">Тип АКБ</th>
                                                    <th class="text-center">Мощность</th>
                                                    <th class="text-center">Напряжение</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($this->data['power_supplies'] as $key => $value)
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-alt-danger" wire:click="removePowerSupply({{$key}})">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="w-100 d-flex justify-content-center" for="d{{ $key }}">
                                                            <input wire:model="data.power_supplies.{{ $key }}.d" type="text" class="form-control form-control-sm w-75" name="d{{ $key }}" id="d{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="purpose{{ $key }}">
                                                            <input wire:model="data.power_supplies.{{ $key }}.purpose" type="text" class="form-control form-control-sm w-75" name="purpose{{ $key }}" id="purpose{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="ip_type_id{{ $key }}">
                                                            <select wire:model="data.power_supplies.{{ $key }}.ip_type_id" type="text" class="form-select form-select-sm w-75" name="ip_type_id{{ $key }}" id="ip_type_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($ip_types as $ip_type)
                                                                <option value="{{ $ip_type->id }}">{{ $ip_type->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="ip_manufacturer_id{{ $key }}">
                                                            <select wire:model="data.power_supplies.{{ $key }}.ip_manufacturer_id" type="text" class="form-select form-select-sm w-75" name="ip_manufacturer_id{{ $key }}" id="ip_manufacturer_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($ip_manufacturers as $ip_manufacturer)
                                                                    <option value="{{ $ip_manufacturer->id }}">{{ $ip_manufacturer->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="battery_type_id{{ $key }}">
                                                            <select wire:model="data.power_supplies.{{ $key }}.battery_type_id" type="text" class="form-select form-select-sm w-75" name="battery_type_id{{ $key }}" id="battery_type_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($battery_types as $battery_type)
                                                                    <option value="{{ $battery_type->id }}">{{ $battery_type->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="power{{ $key }}">
                                                            <input wire:model="data.power_supplies.{{ $key }}.power" type="text" class="form-control form-control-sm w-75" name="power{{ $key }}" id="power{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="voltage{{ $key }}">
                                                            <input wire:model="data.power_supplies.{{ $key }}.voltage" type="text" class="form-control form-control-sm w-75" name="voltage{{ $key }}" id="voltage{{ $key }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row w-100 p-0 m-0">
                    <div class="col-md-8 ps-0">
                        <div class="block block-bordered block-rounded mb-4 fs-sm">
                            <div class="block-header bg-elegance-dark" role="tab" id="base-station-cabinets">
                                <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-cabinets-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                                    Шкафы
                                </a>
                            </div>
                            <div id="base-station-cabinets-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-cabinets">
                                <div class="block-content">
                                    <div class="col-12 mb-4">
                                        <div class="table-responsive text-nowrap">
                                            <table class="own-table w-100">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addCabinet">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Тип BTS</th>
                                                    <th class="text-center">Номер BTS</th>
                                                    <th class="text-center">BSNameNMS</th>
                                                    <th class="text-center">Кол-во трансиверов</th>
                                                    <th class="text-center">Кол-во потоков E1</th>
                                                    <th class="text-center px-3">Mb</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($this->data["cabinets"] as $key => $cabinet)
                                                    <tr>
                                                        <td>
                                                            <a class="btn btn-sm btn-alt-danger" wire:click="removeCabinet({{$key}})">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <livewire:base-stations.base-station.components.choose-cabinet-bts-type :index="$key" :wire:key="'choose-cabinet-bts-type-' . $key" />
                                                        </td>
                                                        <td>
                                                            <label for="bts_number{{ $key }}">
                                                                <input wire:model="data.cabinets.{{ $key }}.bts_number" type="text" class="form-control form-control-sm w-100" id="bts_number{{ $key }}" name="bts_number{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="bs_name_nms{{ $key }}">
                                                                <input wire:model="data.cabinets.{{ $key }}.bs_name_nms" type="text" class="form-control form-control-sm w-100" id="bs_name_nms{{ $key }}" name="bs_name_nms{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="transceivers_number{{ $key }}">
                                                                <input wire:model="data.cabinets.{{ $key }}.transceivers_number" type="text" class="form-control form-control-sm w-100" id="transceivers_number{{ $key }}" name="transceivers_number{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="e1_threads_number{{ $key }}">
                                                                <input wire:model="data.cabinets.{{ $key }}.e1_threads_number" type="text" class="form-control form-control-sm w-100" id="e1_threads_number{{ $key }}" name="e1_threads_number{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="mb{{ $key }}">
                                                                <input wire:model="data.cabinets.{{ $key }}.mb" type="number" class="form-control form-control-sm w-100" id="mb{{ $key }}" name="mb{{ $key }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 pe-0">
                        <div class="block block-bordered block-rounded mb-4 fs-sm">
                            <div class="block-header bg-elegance-dark" role="tab" id="base-station-enodeb">
                                <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-enodeb-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                                    eNodeB
                                </a>
                            </div>
                            <div id="base-station-enodeb-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-enodeb">
                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="table-responsive text-nowrap">
                                                <table class="own-table w-100">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addENode">
                                                                <i class="fa fa-file-circle-plus"></i>
                                                            </a>
                                                        </th>
                                                        <th></th>
                                                        <th class="text-center">eNodeB_id</th>
                                                        <th class="text-center">Диапазон LTE</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($this->data["e_nodes"] as $key => $node)
                                                        <tr>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-alt-danger" wire:click="removeENode({{$key}})">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <label for="e_node_b_id">
                                                                    <input wire:model="data.e_nodes.{{ $key }}.e_node_b_id" type="text" class="form-control form-control-sm w-100" id="e_node_b_id" name="e_node_b_id">
                                                                </label>
                                                            </td>
                                                            <td class="text-center">
                                                                @if(!is_null($this->data['e_nodes'][$key]['diapason']['id']))
                                                                    <label for="diapason_id">
                                                                        <input wire:model="data.e_nodes.{{ $key }}.diapason.name" type="text" class="form-control form-control-sm w-100" id="diapason_id" name="diapason_id">
                                                                    </label>
                                                                @else
                                                                    <button type="button" class="btn btn-sm btn-alt-info" wire:click="getDiapasonLTE({{ $key }})">
                                                                        <i class="far fa-pen-to-square"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-modules-control">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-modules-control-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Модули управления распределенной БС (MU)
                        </a>
                    </div>
                    <div id="base-station-modules-control-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-modules-control">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addModule">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Тип MU</th>
                                                    <th class="text-center">Номер MU</th>
                                                    <th class="text-center">Расположение MU</th>
                                                    <th class="text-center">Номер BTS</th>
                                                    <th class="text-center">BSNameNMS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($this->data['control_modules'] as $key => $module)
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-alt-danger" wire:click="removeModule({{$key}})">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <livewire:base-stations.base-station.components.choose-control-module-mu-type :index="$key" :wire:key="'choose-control-module-mu-type-' . $key" />
                                                    </td>
                                                    <td>
                                                        <label for="mu_number{{ $key }}">
                                                            <input wire:model="data.control_modules.{{ $key }}.mu_number" type="text" class="form-control form-control-sm w-100" id="mu_number{{ $key }}" name="mu_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="room_type_id{{ $key }}">
                                                            <select wire:model="data.control_modules.{{ $key }}.room_type_id" class="form-select form-select-sm w-100" id="room_type_id{{ $key }}" name="room_type_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($room_types as $room_type)
                                                                    <option value="{{ $room_type->id }}">{{ $room_type->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="cabinet_id{{ $key }}">
                                                            <select wire:model="data.control_modules.{{ $key }}.cabinet_id" class="form-select form-select-sm w-100" id="cabinet_id{{ $key }}" name="cabinet_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($this->data['cabinets'] as $cabinetId => $cabinet)
                                                                    <option value="{{ $cabinet['bts_number'] }}">{{ $cabinet['bts_number'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="bs_name_nms{{ $key }}">
                                                            <input wire:model="data.control_modules.{{ $key }}.bs_name_nms" type="text" class="form-control form-control-sm w-100" id="bs_name_nms{{ $key }}" name="bs_name_nms{{ $key }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-radio-modules">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-radio-modules-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Радиомодули распределенной БС (RRU)
                        </a>
                    </div>
                    <div id="base-station-radio-modules-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-radio-modules">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addRadioModule">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Номер RRU</th>
                                                    <th class="text-center">Тип RRU</th>
                                                    <th class="text-center">Сектора</th>
                                                    <th class="text-center">Номер MU</th>
                                                    <th class="text-center">Трансиверы</th>
                                                    <th class="text-center">Тип оптического кабеля</th>
                                                    <th class="text-center">Количество <br> оптических <br> кабелей</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($this->data["radio_modules"] as $key => $module)
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-alt-danger" wire:click="removeRadioModule({{$key}})">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <label for="rru_number{{ $key }}">
                                                            <input wire:model="data.radio_modules.{{ $key }}.rru_number" type="text" class="form-control form-control-sm w-100" id="rru_number{{ $key }}" name="rru_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <livewire:base-stations.base-station.components.choose-radio-module-rru-type :index="$key" :wire:key="'choose-radio-module-rru-type-' . $key" />
                                                    </td>
                                                    <td>
                                                        <label for="sectors{{ $key }}">
                                                            <input wire:model="data.radio_modules.{{ $key }}.sectors" type="text" class="form-control form-control-sm w-100" id="sectors{{ $key }}" name="sectors{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="control_module_id{{ $key }}">
                                                            <select wire:model="data.radio_modules.{{ $key }}.control_module_id" class="form-select form-select-sm w-100" id="control_module_id{{ $key }}" name="control_module_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($this->data['control_modules'] as $cModuleId => $cModule)
                                                                    <option value="{{ $cModule['mu_number'] }}">{{ $cModule['mu_number'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="transceivers{{ $key }}">
                                                            <input wire:model="data.radio_modules.{{ $key }}.transceivers" type="text" class="form-control form-control-sm w-100" id="transceivers{{ $key }}" name="transceivers{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="optical_cable_id{{ $key }}">
                                                            <select wire:model="data.radio_modules.{{ $key }}.optical_cable_id" class="form-select form-select-sm w-100" id="optical_cable_id{{ $key }}" name="optical_cable_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($optical_cables as $optical_cable)
                                                                    <option value="{{ $optical_cable->id }}">{{ $optical_cable->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="optical_cable_number{{ $key }}">
                                                            <input wire:model="data.radio_modules.{{ $key }}.optical_cable_number" type="text" class="form-control form-control-sm w-100" id="optical_cable_number{{ $key }}" name="optical_cable_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-sector">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-sector-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Сектора
                        </a>
                    </div>
                    <div id="base-station-sector-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-sector">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4 d-flex align-items-center">
                                    <label for="checkbox_sector" class="form-label mb-0 me-2">Разные азимуты антенн в секторе: </label>
                                    <input name="checkbox_sector" id="checkbox_sector" class="form-check-input" type="checkbox">
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addSector">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Рсш</th>
                                                    <th class="text-center">Полный номер сектора</th>
                                                    <th class="text-center">CellId</th>
                                                    <th class="text-center">Диапазон сектора</th>
                                                    <th class="text-center">Наименование</th>
                                                    <th class="text-center">ENodeB</th>
                                                    <th class="text-center">Трансиверы</th>
                                                    <th class="text-center">Трансиверов DRate (HR)</th>
                                                    <th class="text-center">Номер BTS</th>
                                                    <th class="text-center">Номер RRU</th>
                                                    <th class="text-center">Кол-во антенн в секторе</th>
                                                    <th class="text-center">Азимут сектора</th>
                                                    <th class="text-center">В метро</th>
                                                    <th class="text-center">Наличие МШУ</th>
                                                    <th class="text-center">Тип МШУ</th>
                                                    <th class="text-center">Количество МШУ</th>
                                                    <th class="text-center">Тип дуплексного фильтра</th>
                                                    <th class="text-center">Количество фильтров</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($this->data["sectors"] as $key => $sector)
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-alt-danger" wire:click="removeSector({{$key}})">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <label for="rssh{{ $key }}" class="w-100">
                                                            <input wire:model="data.sectors.{{ $key }}.rssh" type="checkbox" class="form-check-input" id="rssh{{ $key }}" name="rssh{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="sector_number{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.sector_number" type="text" class="form-control form-control-sm" id="sector_number{{ $key }}" name="sector_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="cell_id{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.cell_id" type="text" class="form-control form-control-sm" id="cell_id{{ $key }}" name="cell_id{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="diapason_id{{ $key }}" >
                                                            <select wire:model="data.sectors.{{ $key }}.diapason_id" type="text" class="form-select form-select-sm" id="diapason_id{{ $key }}" name="diapason_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($this->data['diapasons']['chosen_diapasons'] as $diapasonId => $diapason)
                                                                    <option value="{{ $diapasonId }}">{{ $diapason['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="title{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.title" type="text" class="form-control form-control-sm" id="title{{ $key }}" name="title{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="e_node_b_id{{ $key }}" >
                                                            <select wire:model="data.sectors.{{ $key }}.e_node_b_id" type="text" class="form-select form-select-sm" id="e_node_b_id{{ $key }}" name="e_node_b_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($this->data['e_nodes'] as $eNodeId => $eNode)
                                                                    <option value="{{ $eNodeId }}">{{ $eNode['e_node_b_id'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="transceivers{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.transceivers" type="text" class="form-control form-control-sm" id="transceivers{{ $key }}" name="transceivers{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="drate_transceivers{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.drate_transceivers" type="text" class="form-control form-control-sm" id="drate_transceivers{{ $key }}" name="drate_transceivers{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        @if(array_key_exists('rru_id', $this->data['sectors'][$key]) && is_null($this->data['sectors'][$key]['rru_id']))
                                                            <label for="bts_id{{ $key }}" >
                                                                <select wire:model="data.sectors.{{ $key }}.bts_id" type="text" class="form-select form-select-sm" id="bts_id{{ $key }}" name="bts_id{{ $key }}">
                                                                    <option value="null">Не установлено</option>
                                                                    @foreach($this->data['cabinets'] as $cabinetId => $cabinet)
                                                                        <option value="{{ $cabinetId }}">{{ $cabinet['bts_number'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(array_key_exists('bts_id', $this->data['sectors'][$key]) && is_null($this->data['sectors'][$key]['bts_id']))
                                                        <label for="rru_id{{ $key }}" >
                                                            <select wire:model="data.sectors.{{ $key }}.rru_id" type="text" class="form-select form-select-sm" id="rru_id{{ $key }}" name="rru_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($this->data['radio_modules'] as $rModuleId => $rModule)
                                                                    <option value="{{ $rModuleId }}">{{ $rModule['rru_number'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <label for="antenna_number{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.antenna_number" type="text" class="form-control form-control-sm" id="antenna_number{{ $key }}" name="antenna_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="azimuth{{ $key }}" >
                                                            <input wire:model="data.sectors.{{ $key }}.azimuth" type="number" class="form-control form-control-sm" id="azimuth{{ $key }}" name="azimuth{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="metro{{ $key }}" class="w-100">
                                                            <input wire:model="data.sectors.{{ $key }}.metro" type="checkbox" class="form-check-input" id="metro{{ $key }}" name="metro{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="lna_availability{{ $key }}">
                                                            <input wire:model="data.sectors.{{ $key }}.lna_availability" type="text" class="form-control form-control-sm" id="lna_availability{{ $key }}" name="lna_availability{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="lna_type{{ $key }}">
                                                            <input wire:model="data.sectors.{{ $key }}.lna_type" type="text" class="form-control form-control-sm" id="lna_type{{ $key }}" name="lna_type{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="lna_number{{ $key }}">
                                                            <input wire:model="data.sectors.{{ $key }}.lna_number" type="number" class="form-control form-control-sm" id="lna_number{{ $key }}" name="lna_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="duplex_filter_id{{ $key }}">
                                                            <select wire:model="data.sectors.{{ $key }}.duplex_filter_id" type="text" class="form-select form-select-sm" id="duplex_filter_id{{ $key }}" name="duplex_filter_id{{ $key }}">
                                                                <option value="null">Не установлено</option>
                                                                @foreach($duplex_filters as $duplexFilter)
                                                                    <option value="{{ $duplexFilter->id }}">{{ $duplexFilters->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="duplex_filter_number{{ $key }}">
                                                            <input wire:model="data.sectors.{{ $key }}.duplex_filter_number" type="number" class="form-control form-control-sm" id="duplex_filter_number{{ $key }}" name="duplex_filter_number{{ $key }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-antenna">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-antenna-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Антенно-фидерное оборудование
                        </a>
                    </div>
                    <div id="base-station-antenna-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-antenna">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addAntenna">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Сектора</th>
                                                    <th class="text-center">Номер в сект.</th>
                                                    <th class="text-center">Тип антенны</th>
                                                    <th class="text-center">Мета-артикул</th>
                                                    <th class="text-center">Топ-антенна</th>
                                                    <th class="text-center">Азимут</th>
                                                    <th class="text-center">Высота подвеса</th>
                                                    <th class="text-center">Диапазон</th>
                                                    <th class="text-center">Диаграмма направл</th>
                                                    <th class="text-center">Диаграмма направл 2</th>
                                                    <th class="text-center">КУ антенны</th>
                                                    <th class="text-center">Бисекторная</th>
                                                    <th class="text-center">Наклон антенн (электр.)</th>
                                                    <th class="text-center">Наклон антенн (механ.)</th>
                                                    <th class="text-center">Наклон антенн сумм.</th>
                                                    <th class="text-center">Прием</th>
                                                    <th class="text-center">Передача</th>
                                                    <th class="text-center">Тип фидера</th>
                                                    <th class="text-center">Длина фидера</th>
                                                    <th class="text-center">Широта</th>
                                                    <th class="text-center">Долгота</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($this->data['antennas'] as $key => $antenna)
                                                    <tr>
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-alt-danger" wire:click="removeAntenna({{$key}})">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                        <td></td>
                                                        <td class="text-center">
                                                            <livewire:base-stations.base-station.components.choose-antenna-sectors :index="$key" :sectors="$this->data['sectors']" :wire:key="'choose-antenna-sectors-' . $key" />
                                                        </td>
                                                        <td class="text-center">
                                                            <label for="sector_number{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.sector_number" type="number" class="form-control form-control-sm" id="sector_number{{ $key }}" name="sector_number{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td class="text-center">
                                                            <livewire:base-stations.base-station.components.choose-antenna-type :index="$key" :wire:key="'choose-antenna-type-' . $key" />
                                                        </td>
                                                        <td>
                                                            <label for="meta_article{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.meta_article" type="text" class="form-control form-control-sm" id="meta_article{{ $key }}" name="meta_article{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="top_antenna{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.top_antenna" type="text" class="form-control form-control-sm" id="top_antenna{{ $key }}" name="top_antenna{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="azimuth{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.azimuth" type="text" class="form-control form-control-sm" id="azimuth{{ $key }}" name="azimuth{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="suspension_height{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.suspension_height" type="text" class="form-control form-control-sm" id="suspension_height{{ $key }}" name="suspension_height{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="diapasons{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.diapasons" type="text" class="form-control form-control-sm" id="diapasons{{ $key }}" name="diapasons{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="direction_diagram{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.direction_diagram" type="text" class="form-control form-control-sm" id="direction_diagram{{ $key }}" name="direction_diagram{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="direction_diagram_2{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.direction_diagram_2" type="text" class="form-control form-control-sm" id="direction_diagram_2{{ $key }}" name="direction_diagram_2{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="ku_antennas{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.ku_antennas" type="text" class="form-control form-control-sm" id="ku_antennas{{ $key }}" name="ku_antennas{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="bisector{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.bisector" type="checkbox" class="form-check-input" id="bisector{{ $key }}" name="bisector{{ $key }}" value="1">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="electrical_tilt{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.electrical_tilt" type="text" class="form-control form-control-sm" id="electrical_tilt{{ $key }}" name="electrical_tilt{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="mechanical_tilt{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.mechanical_tilt" type="text" class="form-control form-control-sm" id="mechanical_tilt{{ $key }}" name="mechanical_tilt{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="sum_tilts{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.sum_tilts" type="text" class="form-control form-control-sm" id="sum_tilts{{ $key }}" name="sum_tilts{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="antenna_reception_id{{ $key }}" class="w-100">
                                                                <select wire:model="data.antennas.{{ $key }}.antenna_reception_id" class="form-select form-select-sm" id="antenna_reception_id{{ $key }}" name="antenna_reception_id{{ $key }}">
                                                                    <option value="null">Не установлено</option>
                                                                    @foreach($antenna_receptions as $antenna_reception)
                                                                        <option value="{{ $antenna_reception->id }}">{{ $antenna_reception->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="antenna_transmission_id{{ $key }}" class="w-100">
                                                                <select wire:model="data.antennas.{{ $key }}.antenna_transmission_id" class="form-select form-select-sm" id="antenna_transmission_id{{ $key }}" name="antenna_transmission_id{{ $key }}">
                                                                    <option value="null">Не установлено</option>
                                                                    @foreach($antenna_transmissions as $antenna_transmission)
                                                                        <option value="{{ $antenna_transmission->id }}">{{ $antenna_transmission->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="feeder_id{{ $key }}" class="w-100">
                                                                <select wire:model="data.antennas.{{ $key }}.feeder_id" class="form-select form-select-sm" id="feeder_id{{ $key }}" name="feeder_id{{ $key }}">
                                                                    <option value="null">Не установлено</option>
                                                                    @foreach($feeders as $feeder)
                                                                        <option value="{{ $feeder->id }}">{{ $feeder->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="feeder_length{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.feeder_length" type="number" class="form-control form-control-sm" id="feeder_length{{ $key }}" name="feeder_length{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="latitude{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.latitude" type="text" class="form-control form-control-sm" id="latitude{{ $key }}" name="latitude{{ $key }}">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="longitude{{ $key }}" class="w-100">
                                                                <input wire:model="data.antennas.{{ $key }}.longitude" type="text" class="form-control form-control-sm" id="longitude{{ $key }}" name="longitude{{ $key }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row w-100 p-0 m-0">
                    <div class="col-md-4 ps-0">
                        <div class="block block-bordered block-rounded mb-4 fs-sm">
                            <div class="block-header bg-elegance-dark" role="tab" id="base-station-mcu">
                                <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-mcu-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                                    Модули управления и питания (MCU)
                                </a>
                            </div>
                            <div id="base-station-mcu-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-mcu">
                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="table-responsive text-nowrap">
                                                <table class="own-table w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                <button id="add-row-mcu" class="btn btn-sm btn-alt-primary" wire:click="addMCU" disabled>
                                                                    <i class="fa fa-file-circle-plus"></i>
                                                                </button>
                                                            </th>
                                                            <th></th>
                                                            <th class="text-center">Тип MCU</th>
                                                            <th class="text-center">Номер MCU</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($this->data["mcus"] as $key => $mcu)
                                                        <tr>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-alt-danger" wire:click="removeMCU({{$key}})">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <label for="mcu_type_id">
                                                                    <input wire:model="data.mcus.{{ $key }}.mcu_type_id" type="text" class="form-control form-control-sm w-100" id="mcu_type_id" name="mcu_type_id">
                                                                </label>
                                                            </td>
                                                            <td class="text-center">
                                                                <label for="mcu_number">
                                                                    <input wire:model="data.mcus.{{ $key }}.mcu_number" type="text" class="form-control form-control-sm w-100" id="mcu_number" name="mcu_number">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 pe-0">
                        <div class="block block-bordered block-rounded mb-4 fs-sm">
                            <div class="block-header bg-elegance-dark" role="tab" id="base-station-rcu">
                                <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-rcu-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                                    Блоки управления углами наклона антенны (RCU)
                                </a>
                            </div>
                            <div id="base-station-rcu-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-rcu">
                                <div class="block-content">
                                    <div class="col-12 mb-4">
                                        <div class="table-responsive text-nowrap">
                                            <table class="own-table w-100">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addRcu">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Управляется <br> через RRU</th>
                                                    <th class="text-center">Антенны</th>
                                                    <th class="text-center">Тип антенны</th>
                                                    <th class="text-center">Сектора</th>
                                                    <th class="text-center">Номер MCU/RRU</th>
                                                    <th class="text-center">Тип MCU/RRU</th>
                                                    <th class="text-center">Тип мотора</th>
                                                    <th class="text-center">Тип кабеля (I)</th>
                                                    <th class="text-center">Тип кабеля (O)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($this->data["rcus"] as $rcuKey => $rcu)
                                                    <tr>
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-alt-danger" wire:click="removeRcu({{$rcuKey}})">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                        <td></td>
                                                        <td class="text-center">
                                                            <label>
                                                                <input wire:model="data.rcus.{{ $rcuKey }}.rru_control" class="form-check-input" type="checkbox" value="1">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="antenna_id">
                                                                <select wire:model="data.rcus.{{ $rcuKey }}.antenna_id" class="form-select form-select-sm w-100" name="antenna_id" id="antenna_id" wire:change.debounce.200ms="getAntennaInfo({{ $rcuKey }})">
                                                                    <option value="null" disabled></option>
                                                                    @foreach($this->data['antennas'] as $antennaIndex => $antenna)
                                                                        <option value="{{ $antennaIndex }}">{{ ($antennaIndex + 1) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="antenna_type">
                                                                <input wire:model="data.rcus.{{ $rcuKey }}.antenna_type" type="text" class="form-control form-control-sm" id="antenna_type" name="antenna_type">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="sectors">
                                                                <input wire:model="data.rcus.{{ $rcuKey }}.sectors" type="text" class="form-control form-control-sm" id="sectors" name="sectors" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="number_mcu_rru">
                                                                <select wire:model="data.rcus.{{ $rcuKey }}.number_mcu_rru" class="form-select form-select-sm w-100" name="number_mcu_rru" id="number_mcu_rru" wire:change.debounce.200ms="getRadioModuleInfo({{ $rcuKey }})">
                                                                    <option value="null" disabled></option>
                                                                    @foreach($this->data['radio_modules'] as $rmIndex => $radio_module)
                                                                        <option value="{{ $rmIndex }}">{{ $radio_module['rru_number'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="type_mcu_rru">
                                                                <input wire:model="data.rcus.{{ $rcuKey }}.type_mcu_rru" type="text" class="form-control form-control-sm" id="type_mcu_rru" name="type_mcu_rru" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <livewire:base-stations.base-station.components.choose-motor-type :index="$rcuKey" :wire:key="'choose-radio-motor-type-' . $rcuKey" />
                                                        </td>
                                                        <td>
                                                            <livewire:base-stations.base-station.components.choose-i-cable-type :index="$rcuKey" :wire:key="'choose-radio-i-cable-type-' . $rcuKey" />
                                                        </td>
                                                        <td>
                                                            <livewire:base-stations.base-station.components.choose-o-cable-type :index="$rcuKey" :wire:key="'choose-radio-o-cable-type-' . $rcuKey" />
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-transport">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-transport-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Техническая характеристика участка транспортной сети
                        </a>
                    </div>
                    <div id="base-station-transport-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-transport">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="row w-100 h-100 m-0 p-0">
                                        <div class="col-12 mb-3 ps-0">
                                            <button type="button" class="btn btn-sm btn-alt-secondary" disabled>Связать проект с ПРТС</button>
                                        </div>
                                        <div class="col-12 ps-0 mb-3 d-flex align-items-center">
                                            <label for="responsible_user_id" class="mb-0 me-3">Ответственный за ведение ИД по ТС</label>
                                            <input wire:model="data.transports.responsible_user_id" type="text" class="form-control form-control-sm w-auto" name="responsible_user_id" id="responsible_user_id" disabled>
                                        </div>
                                        <div class="col-12 ps-0 d-flex">
                                            <div class="col-4 d-flex align-items-center">
                                                <label for="gfc_node" class="mb-0 me-3">ГФК узла</label>
                                                <input wire:model="data.transports.gfc_node" type="text" class="form-control form-control-sm w-75" name="gfc_node" id="gfc_node">
                                            </div>
                                            <div class="col-5 d-flex align-items-center">
                                                <label for="correct_id" class="mb-0 me-3">ИД корректны</label>
                                                <input wire:model="data.transports.correct_id" type="checkbox" class="form-check-input" name="correct_id" id="correct_id">
                                                <button type="button" class="btn btn-sm btn-alt-secondary ms-3" disabled>Добавить из SDB</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <a id="add-row-power-supplier" class="btn btn-sm btn-alt-primary" wire:click="addTransport">
                                                            <i class="fa fa-file-circle-plus"></i>
                                                        </a>
                                                    </th>
                                                    <th></th>
                                                    <th class="text-center">Тип ТС</th>
                                                    <th class="text-center">Комплект позиции</th>
                                                    <th class="text-center">Статус линии</th>
                                                    <th class="text-center">№ линии</th>
                                                    <th class="text-center">Арендодатель</th>
                                                    <th class="text-center">Тип оборудования</th>
                                                    <th class="text-center">Интерфейс</th>
                                                    <th class="text-center">Полоса TDM, Mbps</th>
                                                    <th class="text-center">Полоса IP, Mbps</th>
                                                    <th class="text-center">Обобщ. частота, ГГц</th>
                                                    <th class="text-center">Скорость, Мбит/с</th>
                                                    <th class="text-center">Диаметр антенны в т.А, м</th>
                                                    <th class="text-center">Диаметр 2 антенны в т.А, м</th>
                                                    <th class="text-center">Высота подвеса в т.А</th>
                                                    <th class="text-center">Высота 2 подвеса в т.А</th>
                                                    <th class="text-center">Мощность, Вт</th>
                                                    <th class="text-center">Азимут А, гр</th>
                                                    <th class="text-center">Резервирование</th>
                                                    <th class="text-center">Код узла</th>
                                                    <th class="text-center">Наименование ответки</th>
                                                    <th class="text-center">Код позиции</th>
                                                    <th class="text-center">Комплект ответки</th>
                                                    <th class="text-center">Широта ответки</th>
                                                    <th class="text-center">Долгота ответки</th>
                                                    <th class="text-center">Диаметр антенны в т.Б, м</th>
                                                    <th class="text-center">Диаметр 2 антенны в т.Б, м</th>
                                                    <th class="text-center">Высота подвеса в т.Б</th>
                                                    <th class="text-center">Высота 2 подвеса в т.Б</th>
                                                    <th class="text-center">Азимут Б, гр</th>
                                                    <th class="text-center">Дата изменения <br> фактических <br> параметров высот</th>
                                                    <th class="text-center">Дальность, км</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($this->data['transports']['networks']) > 0)
                                                @foreach($this->data['transports']['networks'] as $networkKey => $network)
                                                    <tr wire:key="network-row-{{ $networkKey }}">
                                                        <td class="text-center">
                                                            <a class="btn btn-sm btn-alt-danger" wire:click="removeTransport({{ $networkKey }})">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <label class="w-100" for="vehicle_type_id">
                                                                <select wire:model="data.transports.networks.{{ $networkKey }}.vehicle_type_id" class="form-select form-select-sm w-100" name="vehicle_type_id" id="vehicle_type_id">
                                                                    <option value="null"></option>
                                                                    @foreach($vehicles as $vehicle)
                                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="position_set_id">
                                                                <select wire:model="data.transports.networks.{{ $networkKey }}.position_set_id" class="form-select form-select-sm w-100" name="position_set_id" id="position_set_id">
                                                                    <option value="null"></option>
                                                                    @foreach($position_sets as $position_set)
                                                                        <option value="{{ $position_sets->id }}">{{ $position_sets->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="line_status_id">
                                                                <select wire:model="data.transports.networks.{{ $networkKey }}.line_status_id" class="form-select form-select-sm w-100" name="line_status_id" id="line_status_id">
                                                                    <option value="null"></option>
                                                                    @foreach($line_statuses as $line_status)
                                                                        <option value="{{ $line_status->id }}">{{ $line_status->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="line_number">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.line_number" class="form-control form-control-sm w-100" name="line_number" id="line_number">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="landowner">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.landowner" class="form-control form-control-sm w-100" name="landowner" id="landowner">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <livewire:base-stations.base-station.components.choose-network-equipment-type :index="$networkKey" :wire:key="'choose-network-equipment-type-' . $networkKey" />
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="interface">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.interface" class="form-control form-control-sm w-100" name="interface" id="interface">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="tdm_band">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.tdm_band" class="form-control form-control-sm w-100" name="tdm_band" id="tdm_band">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="ip_band">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.ip_band" class="form-control form-control-sm w-100" name="ip_band" id="ip_band">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="generalization_frequency">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.generalization_frequency" class="form-control form-control-sm w-100" name="generalization_frequency" id="generalization_frequency">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="speed">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.speed" class="form-control form-control-sm w-100" name="speed" id="speed">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="antenna_diameter_in_ta">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.antenna_diameter_in_ta" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_ta" id="antenna_diameter_in_ta">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="antenna_diameter_in_ta_2">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.antenna_diameter_in_ta_2" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_ta_2" id="antenna_diameter_in_ta_2">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="suspension_height_in_ta">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.suspension_height_in_ta" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_ta" id="suspension_height_in_ta">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="suspension_height_in_ta_2">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.suspension_height_in_ta_2" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_ta_2" id="suspension_height_in_ta_2">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="power">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.power" type="text" class="form-control form-control-sm w-100" name="power" id="power">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="azimuth_a">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.azimuth_a" type="number" class="form-control form-control-sm w-100" name="azimuth_a" id="azimuth_a">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="reservation">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.reservation" type="text" class="form-control form-control-sm w-100" name="reservation" id="reservation">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="node_code">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.node_code" type="text" class="form-control form-control-sm w-100" name="node_code" id="node_code">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <livewire:base-stations.base-station.components.choose-network-position-number :index="$networkKey" :wire:key="'choose-network-position-number-' . $networkKey" />
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="item_code">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.item_code" type="text" class="form-control form-control-sm w-100" name="item_code" id="item_code" readonly>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="response_latitude">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.response_latitude" type="text" class="form-control form-control-sm w-100" name="response_latitude" id="response_latitude" readonly>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="response_latitude">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.response_latitude" type="text" class="form-control form-control-sm w-100" name="response_latitude" id="response_latitude" readonly>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="response_longitude">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.response_longitude" type="text" class="form-control form-control-sm w-100" name="response_longitude" id="response_longitude" readonly>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="antenna_diameter_in_tb">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.antenna_diameter_in_tb" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_tb" id="antenna_diameter_in_tb">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="antenna_diameter_in_tb_2">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.antenna_diameter_in_tb_2" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_tb_2" id="antenna_diameter_in_tb_2">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="suspension_height_in_tb">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.suspension_height_in_tb" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_tb" id="suspension_height_in_tb">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="suspension_height_in_tb_2">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.suspension_height_in_tb_2" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_tb_2" id="suspension_height_in_tb_2">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="azimuth_b">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.azimuth_b" type="number" class="form-control form-control-sm w-100" name="azimuth_b" id="azimuth_b">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="change_date">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.change_date" type="text" class="form-control form-control-sm w-100" name="change_date" id="change_date" readonly>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="w-100" for="range">
                                                                <input wire:model="data.transports.networks.{{ $networkKey }}.range" type="number" class="form-control form-control-sm w-100" name="range" id="range">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center mt-3">
                <x-action.cancel route="{{ route('base-stations.base-station.index') }}" />
                <x-action.archive target="submitForm" />
                @can('send base-station')
                    <x-action.send target="submitForm" />
                @endcan
            </div>
        </form>
    </div>

    @if (session('alert'))
        <div class="alert bg-danger text-white position-fixed mx-10" style="bottom: 100px;">
            <span class="fs-sm">{!! session('alert') !!}</span>
            <span class="btn btn-sm btn-alt-danger ms-3" style="cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
    @endif
</div>
