<x-app-layout>
    <div class="content">
        <div class="block-content p-0">
            <div id="base-station-info" role="tablist" aria-multiselectable="true">
                <div class="block block-bordered block-rounded mb-4 fs-sm">
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-position-info">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-position-info-block" aria-expanded="true" aria-controls="base-station-position-info-block">{{ \App\Models\Widget\TextName::getTextTranslation('base-station-position-info') }}</a>
                        <form action="{{ route('base-stations.download-awp') }}" method="POST">
                            @csrf
                            <label>
                                <input name="bs-application-id" type="number" value="{{ $baseStationApplication->id }}" hidden>
                            </label>
                            <button type="submit" class="btn btn-sm btn-info">Скачать АВП</button>
                        </form>
                    </div>
                    <div id="base-station-position-info-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-position-info">
                        <div class="block-content">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <label for="year" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_stations', 'year') }}:</label>
                                    <input type="text" class="form-control form-control-sm w-auto" id="name" name="year" value="{{ $baseStationApplication->baseStation->year }}" disabled>
                                </div>
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <label for="application_type_id" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_applications', 'application_type_id') }} <x-texts.required-sign />:</label>
                                    <input type="text" class="form-control form-control-sm w-auto" id="name" name="year" value="{{ $baseStationApplication->application_type->translations[0]->name }}" disabled>
                                </div>
                                <hr class="opacity-100">
                                <div class="position-info-block px-0">
                                    <div class="row w-100 h-100 mx-0 p-0">
                                        <div class="w-auto mb-3">
                                            <label for="position_region" class="form-label">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'region_id') }}:</label>
                                            <input name="position_region" id="position_region" class="form-control form-control-sm w-auto" value="{{ $baseStationApplication->baseStation->position?->region->translations[0]->name }}" readonly disabled>
                                        </div>
                                        <div class="w-auto mb-3">
                                            <label for="position_area" class="form-label">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'area_id') }}:</label>
                                            <input name="position_area" id="position_area" class="form-control form-control-sm w-auto" value="{{ $baseStationApplication->baseStation->position?->area?->translations[0]->name }}" readonly disabled>
                                        </div>
                                        <div class="col-12 d-flex align-items-center mb-3">
                                            <label for="position_address" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'address') }}:</label>
                                            <input name="position_address" id="position_address" class="form-control form-control-sm w-100" value="{{ $baseStationApplication->baseStation->position?->address }}" readonly disabled>
                                        </div>
                                        <div class="col-6 d-flex align-items-center mb-3">
                                            <label for="base_station_name" class="form-label text-nowrap mb-0 me-3">{{ \App\Models\Widget\TextName::getTextTranslation('base-station-name') }}:</label>
                                            <input name="base_station_name" id="base_station_name" class="form-control form-control-sm w-100" value="{{ $baseStationApplication->baseStation->position?->name }}" readonly disabled>
                                        </div>
                                        <div class="col-6 d-flex align-items-center mb-3">
                                            <label for="position_name" class="form-label mb-0 me-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }}:</label>
                                            <input name="position_name" id="position_name" class="form-control form-control-sm w-100" value="{{ $baseStationApplication->baseStation->position?->name }}" readonly disabled>
                                        </div>
                                        <div class="col-12 d-flex align-items-center">
                                            <div class="col-lg-5 d-flex align-items-center mb-4">
                                                <label class="form-label mb-0 me-3" for="coordinate_id">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-system') }}: <x-texts.required-sign /></label>
                                                <input name="position_region" id="position_region" class="form-control form-control-sm w-auto" value="{{ $baseStationApplication->baseStation->position?->coordinate->name }}" readonly disabled>
                                            </div>
                                            <div class="col-lg-7 mb-4">
                                                <div class="row w-100 m-0 p-0">
                                                    <div class="col-6 d-flex align-items-center">
                                                        <label class="col-form-label col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'latitude') }}: <span class="text-danger ms-1">*</span></label>
                                                        <div class="col-8">
                                                            <div class="col-12 mb-1">
                                                                @php
                                                                    $data = explode(' ', (new \App\Helpers\Helper)->decimalToDegree($baseStationApplication->baseStation->position->latitude));
                                                                @endphp
                                                                <label class="w-100 d-flex justify-content-between">
                                                                    <label class="col-3">
                                                                        <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[0] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">°</span>
                                                                    </label>
                                                                    <label class="col-3">
                                                                        <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[1] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">'</span>
                                                                    </label>
                                                                    <label class="col-4">
                                                                        <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[2] }}" readonly disabled>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="w-100">
                                                                    <input step="any" type="number" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStation->position?->latitude }}" readonly disabled>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex align-items-center">
                                                        <label class="col-form-label col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'longitude') }}: <span class="text-danger ms-1">*</span></label>
                                                        <div class="col-8">
                                                            <div class="col-12 mb-1">
                                                                @php
                                                                    $data = explode(' ', (new \App\Helpers\Helper)->decimalToDegree($baseStationApplication->baseStation->position->longitude));
                                                                @endphp
                                                                <label class="w-100 d-flex justify-content-between">
                                                                    <label class="col-3">
                                                                        <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[0] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">°</span>
                                                                    </label>
                                                                    <label class="col-3">
                                                                        <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[1] }}" readonly disabled>
                                                                    </label>
                                                                    <label class="col-1">
                                                                        <span class="ps-1 fs-lg">'</span>
                                                                    </label>
                                                                    <label class="col-4">
                                                                        <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[2] }}" readonly disabled>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="w-100">
                                                                    <input step="any" type="number" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStation->position?->longitude }}" readonly disabled>
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
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                            <tr>
                                                <th class="text-center px-4">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_diapasons', 'number') }}</th>
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
                                            @foreach($baseStationApplication->diapasons as $diapason)
                                                <tr>
                                                    <td class="text-center">
                                                        <label class="w-100">
                                                            <input value="{{ $diapason->number }}" type="text" class="form-control form-control-sm w-100" readonly>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">{{ $diapason->diapason->technology->name . ' ' . $diapason->diapason->band }}</td>
                                                    <td class="text-center">{{ $diapason->controller->name }}</td>
                                                    <td class="text-center">{{ $diapason->controller->address }}</td>
                                                    <td class="text-center">
                                                        <label for="">
                                                            <select class="form-select form-select-sm" name="" id="" disabled>
                                                                <option value="">Не установлено</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label>
                                                            <input class="form-check-input" type="checkbox" @if($diapason->is_new) checked @endif disabled>
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
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->room_type?->title }}" id="room_type_id" name="room_type_id" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="hardware_room_id" class="form-label">Место размещения аппаратной:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->hardware_room?->title }}" id="hardware_room_id" name="hardware_room_id" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="hardware_owner_id" class="form-label">Совместная аппаратная владелец:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->hardware_owner?->title }}" id="hardware_owner_id" name="hardware_owner_id" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="location_antenna_id" class="form-label">Место размещ. антенн:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->location_antenna?->title }}" id="location_antenna_id" name="location_antenna_id" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="height_afu" class="form-label">Высота объекта размещ. АФУ, м:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->height_afu }}" id="height_afu" name="height_afu" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="general_contractor_id" class="form-label">Генеральный подрядчик:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->general_contractor?->title }}" id="general_contractor_id" name="general_contractor_id" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="type_ka" class="form-label">Тип К/А:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->type_ka }}" id="type_ka" name="type_ka" disabled>
                                </div>
                                <div class="col-md-3 col-12 mb-4">
                                    <label for="k_a_id" class="form-label">К/А:</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $baseStationApplication->baseStationDiapasonInfo->ka?->title }}" id="k_a_id" name="k_a_id" disabled>
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
                                                        <select class="form-select form-select-sm" name="structure_type_id" id="structure_type_id" disabled>
                                                            <option value="null">Не установлено</option>
                                                        </select>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="structure_owner_id">
                                                        <select class="form-select form-select-sm" name="structure_owner_id" id="structure_owner_id" disabled>
                                                            <option value="null">Не установлено</option>
                                                        </select>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="height">
                                                        <input class="form-control form-control-sm w-auto" name="height" id="height"  type="text" disabled>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="structure_location_id">
                                                        <select class="form-select form-select-sm" name="structure_location_id" id="structure_location_id" disabled>
                                                            <option value="null">Не установлено</option>
                                                        </select>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="height_afu">
                                                        <input type="number" class="form-control form-control-sm w-auto" name="height_afu" id="height_afu" disabled>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="height_rrl">
                                                        <input type="number" class="form-control form-control-sm w-auto" name="height_rrl" id="height_rrl" disabled>
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
                                                        <input type="text" class="form-control form-control-sm w-100" id="lead_operator_id" name="lead_operator_id" value="{{ $baseStationApplication->baseStationARS->leadOperator?->title }}" disabled>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="infrastructure_owner_id" class="w-100">
                                                        <input type="text" class="form-control form-control-sm w-100" id="infrastructure_owner_id" name="infrastructure_owner_id" value="{{ $baseStationApplication->baseStationARS->infrastructureOwner?->title }}" disabled>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="second_operator_number" class="w-100">
                                                        <input type="text" class="form-control form-control-sm w-100" id="second_operator_number" name="second_operator_number" value="{{ $baseStationApplication->baseStationARS->second_operator_number }}" disabled>
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
                                    <input value="{{ $baseStationApplication->baseStationARS->contractor_for_reinforcement }}" type="text" class="form-control form-control-sm w-100" step="any" name="contractor_for_reinforcement" id="contractor_for_reinforcement" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rrl_response_part_id" class="form-label">Усиление ответной части РРЛ:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->rrlResponsePart?->title }}" type="text" class="form-control form-control-sm w-100" name="rrl_response_part_id" id="rrl_response_part_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rns_need_id" class="form-label">Необходимость усиления РНС:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->rnsNeed?->title }}" type="text" class="form-control form-control-sm w-100" name="rns_need_id" id="rns_need_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rns_result_id" class="form-label">Результат РНС:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->rnsResult?->title }}" type="text" class="form-control form-control-sm w-100" name="rns_result_id" id="rns_result_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="strength_possibility_id" class="form-label">Возможность усиления:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->strengthPossibility?->title }}" type="text" class="form-control form-control-sm w-100" name="strength_possibility_id" id="strength_possibility_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="rental_agreement_id" class="form-label">Наличие договора аренды:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->rentalAgreement?->title }}" type="text" class="form-control form-control-sm w-100" name="rental_agreement_id" id="rental_agreement_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="electricity_specification_id" class="form-label">Наличие ТУ на электроэнергию:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->electricitySpecification?->title }}" type="text" class="form-control form-control-sm w-100" name="electricity_specification_id" id="electricity_specification_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="placement_specification_id" class="form-label">Наличие ТУ на размещение:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->placementSpecification?->title }}" type="text" class="form-control form-control-sm w-100" name="placement_specification_id" id="placement_specification_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="placement_required_id" class="form-label">Требуются ТУ на размещение:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->placementRequired?->title }}" type="text" class="form-control form-control-sm w-100" name="placement_required_id" id="placement_required_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="financial_category_position_id" class="form-label">Финансовая категория позиции:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->financialCategoryPosition?->title }}" type="text" class="form-control form-control-sm w-100" name="financial_category_position_id" id="financial_category_position_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="power_category_id" class="form-label">Категория электропитания</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->powerCategory?->title }}" type="text" class="form-control form-control-sm w-100" name="power_category_id" id="power_category_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="wind_farm_specification_id" class="form-label">Необходимость получения ТУ на ВЭС:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->windFarmSpecification?->title }}" type="text" class="form-control form-control-sm w-100" name="wind_farm_specification_id" id="wind_farm_specification_id" disabled>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="energy_department_comment" class="form-label">Комментарий отдела энергетики:</label>
                                    <textarea class="form-control form-control-sm w-100" name="energy_department_comment" id="energy_department_comment" cols="30" rows="2" disabled>{{ $baseStationApplication->baseStationARS->energy_department_comment }}</textarea>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="number" class="form-label">Номер РО:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->number }}" class="form-control form-control-sm w-100" name="number" id="number" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="col-12 mb-2">
                                        <label class="form-label" for="power_backup">Наличие осветительных огней</label>
                                        <input type="checkbox" class="form-check-input float-end" id="power_backup" name="power_backup" value="1" @if($baseStationApplication->baseStationARS->power_backup) checked @endif>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="lighting_lights">Наличие резервирования питания</label>
                                        <input type="checkbox" class="form-check-input float-end" name="lighting_lights" id="lighting_lights" value="1" @if($baseStationApplication->baseStationARS->lighting_lights) checked @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="additional_information" class="form-label">Дополнительная информация:</label>
                                    <textarea class="form-control form-control-sm w-100" name="additional_information" id="additional_information" cols="30" rows="2" disabled>{{ $baseStationApplication->baseStationARS->additional_information }}</textarea>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="vehicle_cable_id" class="form-label">Волновое сопротивление кабелей к ТС:</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->vehicleCable?->title }}" type="text" class="form-control form-control-sm w-100" name="vehicle_cable_id" id="vehicle_cable_id" disabled>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="cabinets_number" class="form-label">Количество радио-шкафов (кабинетов, стоек):</label>
                                    <input value="{{ $baseStationApplication->baseStationARS->cabinets_number }}" class="form-control form-control-sm w-100" name="cabinets_number" id="cabinets_number" disabled>
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
                                                <th class="text-center"></th>
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
                                            @foreach($baseStationApplication->baseStationPowerSupplies as $key => $powerSupply)
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">
                                                        <label class="w-100 d-flex justify-content-center" for="d{{ $key }}">
                                                            <input value="{{ $powerSupply->d }}" type="text" class="form-control form-control-sm w-75" name="d{{ $key }}" id="d{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="purpose{{ $key }}">
                                                            <input value="{{ $powerSupply->purpose }}" type="text" class="form-control form-control-sm w-75" name="purpose{{ $key }}" id="purpose{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="ip_type_id{{ $key }}">
                                                            <input value="{{ $powerSupply->ipType?->title }}" type="text" class="form-control form-control-sm w-75" name="ip_type_id{{ $key }}" id="ip_type_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="ip_manufacturer_id{{ $key }}">
                                                            <input value="{{ $powerSupply->ipManufacturer?->title }}" type="text" class="form-control form-control-sm w-75" name="ip_manufacturer_id{{ $key }}" id="ip_manufacturer_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="battery_type_id{{ $key }}">
                                                            <input value="{{ $powerSupply->batteryType?->title }}" type="text" class="form-control form-control-sm w-75" name="battery_type_id{{ $key }}" id="battery_type_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="power{{ $key }}">
                                                            <input value="{{ $powerSupply->power }}" type="text" class="form-control form-control-sm w-75" name="power{{ $key }}" id="power{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100 d-flex justify-content-center" for="voltage{{ $key }}">
                                                            <input value="{{ $powerSupply->voltage }}" type="text" class="form-control form-control-sm w-75" name="voltage{{ $key }}" id="voltage{{ $key }}" disabled>
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
                                                        <th class="text-center"></th>
                                                        <th class="text-center">Тип BTS</th>
                                                        <th class="text-center">Номер BTS</th>
                                                        <th class="text-center">BSNameNMS</th>
                                                        <th class="text-center">Кол-во трансиверов</th>
                                                        <th class="text-center">Кол-во потоков E1</th>
                                                        <th class="text-center px-3">Mb</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($baseStationApplication->baseStationCabinets as $key => $cabinet)
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <label for="type_id{{ $key }}">
                                                                <input value="{{ $cabinet->btsType?->model }}" type="text" class="form-control form-control-sm w-100" id="type_id{{ $key }}" name="type_id{{ $key }}" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="bts_number{{ $key }}">
                                                                <input value="{{ $cabinet->bts_number }}" type="text" class="form-control form-control-sm w-100" id="bts_number{{ $key }}" name="bts_number{{ $key }}" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="bs_name_nms{{ $key }}">
                                                                <input value="{{ $cabinet->bs_name_nms }}" type="text" class="form-control form-control-sm w-100" id="bs_name_nms{{ $key }}" name="bs_name_nms{{ $key }}" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="transceivers_number{{ $key }}">
                                                                <input value="{{ $cabinet->transceivers_number }}" type="text" class="form-control form-control-sm w-100" id="transceivers_number{{ $key }}" name="transceivers_number{{ $key }}" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="e1_threads_number{{ $key }}">
                                                                <input value="{{ $cabinet->e1_threads_number }}" type="text" class="form-control form-control-sm w-100" id="e1_threads_number{{ $key }}" name="e1_threads_number{{ $key }}" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="mb{{ $key }}">
                                                                <input value="{{ $cabinet->mb }}" type="text" class="form-control form-control-sm w-100" id="mb{{ $key }}" name="mb{{ $key }}" disabled>
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
                                                        <th></th>
                                                        <th class="text-center">eNodeB_id</th>
                                                        <th class="text-center">Диапазон LTE</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($baseStationApplication->baseStationENodes as $key => $node)
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <label for="e_node_b_id">
                                                                    <input value="{{ $node->e_node_b_id }}" type="text" class="form-control form-control-sm w-100" id="e_node_b_id" name="e_node_b_id">
                                                                </label>
                                                            </td>
                                                            <td class="text-center">
                                                                <label for="diapason_id">
                                                                    <input value="{{ $node->diapason->technology->name . ' ' . $node->diapason->band }}" type="text" class="form-control form-control-sm w-100" id="diapason_id" name="diapason_id">
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
                                                    <th></th>
                                                    <th class="text-center">Тип MU</th>
                                                    <th class="text-center">Номер MU</th>
                                                    <th class="text-center">Расположение MU</th>
                                                    <th class="text-center">Номер BTS</th>
                                                    <th class="text-center">BSNameNMS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($baseStationApplication->baseStationControlModules as $key => $module)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <label for="my_type_id{{ $key }}">
                                                            <input value="{{ $module->muType?->model }}" type="text" class="form-control form-control-sm w-100" id="my_type_id{{ $key }}" name="my_type_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="mu_number{{ $key }}">
                                                            <input value="{{ $module->mu_number }}" type="text" class="form-control form-control-sm w-100" id="mu_number{{ $key }}" name="mu_number{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="room_type_id{{ $key }}">
                                                            <input value="{{ $module->roomType?->title }}" type="text" class="form-control form-control-sm w-100" id="room_type_id{{ $key }}" name="room_type_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="cabinet_id{{ $key }}">
                                                            <input value="{{ $module->cabinet_id }}" type="text" class="form-control form-control-sm w-100" id="cabinet_id{{ $key }}" name="cabinet_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="bs_name_nms{{ $key }}">
                                                            <input value="{{ $module->bs_name_nms }}" type="text" class="form-control form-control-sm w-100" id="bs_name_nms{{ $key }}" name="bs_name_nms{{ $key }}" disabled>
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
                                            @foreach($baseStationApplication->baseStationRadioModules as $key => $module)
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <label for="rru_number{{ $key }}">
                                                            <input value="{{ $module->rru_number }}" type="text" class="form-control form-control-sm w-100" id="rru_number{{ $key }}" name="rru_number{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="rru_type{{ $key }}">
                                                            <input value="{{ $module->rruType?->model }}" type="text" class="form-control form-control-sm w-100" id="rru_type{{ $key }}" name="rru_type{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="sectors{{ $key }}">
                                                            <input value="{{ $module->sectors }}" type="text" class="form-control form-control-sm w-100" id="sectors{{ $key }}" name="sectors{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="control_module_id{{ $key }}">
                                                            <input value="{{ $module->control_module_id }}" type="text" class="form-control form-control-sm w-100" id="sectors{{ $key }}" name="sectors{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="transceivers{{ $key }}">
                                                            <input value="{{ $module->transceivers }}" type="text" class="form-control form-control-sm w-100" id="transceivers{{ $key }}" name="transceivers{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="optical_cable_id{{ $key }}">
                                                            <input value="{{ $module->opticalCable?->title }}" type="text" class="form-control form-control-sm w-100" id="optical_cable_id{{ $key }}" name="optical_cable_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="optical_cable_number{{ $key }}">
                                                            <input value="{{ $module->optical_cable_number }}" type="text" class="form-control form-control-sm w-100" id="optical_cable_number{{ $key }}" name="optical_cable_number{{ $key }}" disabled>
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
                                    <input name="checkbox_sector" id="checkbox_sector" class="form-check-input" type="checkbox" disabled>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="table-responsive text-nowrap">
                                        <table class="own-table w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">Рсш</th>
                                                    <th class="text-center">Полный номер сектора</th>
                                                    <th class="text-center px-5">CellId</th>
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
                                            @foreach($baseStationApplication->baseStationSectors as $key => $sector)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <label for="rssh{{ $key }}" class="w-100">
                                                            <input value="1" type="checkbox" class="form-check-input" id="rssh{{ $key }}" name="rssh{{ $key }}" @if($sector->rssh) checked @endif disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="sector_number{{ $key }}">
                                                            <input value="{{ $sector->sector_number }}" type="text" class="form-control form-control-sm" id="sector_number{{ $key }}" name="sector_number{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="cell_id{{ $key }}">
                                                            <input value="{{ $sector->cell_id }}" type="text" class="form-control form-control-sm" id="cell_id{{ $key }}" name="cell_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="diapason_id{{ $key }}" >
                                                            <input value="{{ $sector->diapason->technology->name . ' ' . $sector->diapason->band }}" type="text" class="form-control form-control-sm" id="diapason_id{{ $key }}" name="diapason_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="title{{ $key }}" >
                                                            <input value="{{ $sector->title }}" type="text" class="form-control form-control-sm" id="title{{ $key }}" name="title{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="e_node_b_id{{ $key }}" >
                                                            <input value="{{ $sector->e_node_b_id }}" type="text" class="form-control form-control-sm" id="e_node_b_id{{ $key }}" name="e_node_b_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="transceivers{{ $key }}" >
                                                            <input value="{{ $sector->transceivers }}" type="text" class="form-control form-control-sm" id="transceivers{{ $key }}" name="transceivers{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="drate_transceivers{{ $key }}" >
                                                            <input value="{{ $sector->drate_transceivers }}" type="text" class="form-control form-control-sm" id="drate_transceivers{{ $key }}" name="drate_transceivers{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="bts_id{{ $key }}" >
                                                            <input value="{{ $sector->bts_id }}" type="text" class="form-control form-control-sm" id="bts_id{{ $key }}" name="bts_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="rru_id{{ $key }}" >
                                                            <input value="{{ $sector->rru_id }}" type="text" class="form-control form-control-sm" id="rru_id{{ $key }}" name="rru_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="antenna_number{{ $key }}" >
                                                            <input value="{{ $sector->antenna_number }}" type="text" class="form-control form-control-sm" id="antenna_number{{ $key }}" name="antenna_number{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="azimuth{{ $key }}" >
                                                            <input value="{{ $sector->azimuth }}" type="number" class="form-control form-control-sm" id="azimuth{{ $key }}" name="azimuth{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="metro{{ $key }}" class="w-100">
                                                            <input value="1" type="checkbox" class="form-check-input" id="metro{{ $key }}" name="metro{{ $key }}" @if($sector->metro) checked @endif disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="lna_availability{{ $key }}">
                                                            <input value="{{ $sector->lna_availability }}" type="text" class="form-control form-control-sm" id="lna_availability{{ $key }}" name="lna_availability{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="lna_type{{ $key }}">
                                                            <input value="{{ $sector->lna_type }}" type="text" class="form-control form-control-sm" id="lna_type{{ $key }}" name="lna_type{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="lna_number{{ $key }}">
                                                            <input value="{{ $sector->lna_number }}" type="number" class="form-control form-control-sm" id="lna_number{{ $key }}" name="lna_number{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="duplex_filter_id{{ $key }}">
                                                            <input value="{{ $sector->duplex_filter?->title }}" type="text" class="form-control form-control-sm" id="duplex_filter_id{{ $key }}" name="duplex_filter_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="duplex_filter_number{{ $key }}">
                                                            <input value="{{ $sector->duplex_filter_id }}" type="number" class="form-control form-control-sm" id="duplex_filter_number{{ $key }}" name="duplex_filter_number{{ $key }}" disabled>
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
                                                <th></th>
                                                <th class="text-center px-3">Сектора</th>
                                                <th class="text-center">Номер в сект.</th>
                                                <th class="text-center px-5">Тип антенны</th>
                                                <th class="text-center">Мета-артикул</th>
                                                <th class="text-center">Топ-антенна</th>
                                                <th class="text-center px-3">Азимут</th>
                                                <th class="text-center">Высота подвеса</th>
                                                <th class="text-center px-7">Диапазон</th>
                                                <th class="text-center">Диаграмма направл</th>
                                                <th class="text-center">Диаграмма направл 2</th>
                                                <th class="text-center">КУ антенны</th>
                                                <th class="text-center">Бисекторная</th>
                                                <th class="text-center">Наклон антенн (электр.)</th>
                                                <th class="text-center">Наклон антенн (механ.)</th>
                                                <th class="text-center">Наклон антенн сумм.</th>
                                                <th class="text-center px-5">Прием</th>
                                                <th class="text-center px-4">Передача</th>
                                                <th class="text-center px-4">Тип фидера</th>
                                                <th class="text-center">Длина фидера</th>
                                                <th class="text-center px-5">Широта</th>
                                                <th class="text-center px-5">Долгота</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($baseStationApplication->baseStationAntennas as $key => $antenna)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <label for="sectors{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->sectors }}" type="text" class="form-control form-control-sm" id="sectors{{ $key }}" name="sectors{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="sector_number{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->sector_number }}" type="number" class="form-control form-control-sm" id="sector_number{{ $key }}" name="sector_number{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="antenna_type_id{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->antenna_type?->model }}" type="text" class="form-control form-control-sm" id="antenna_type_id{{ $key }}" name="antenna_type_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="meta_article{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->meta_article }}" type="text" class="form-control form-control-sm" id="meta_article{{ $key }}" name="meta_article{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="top_antenna{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->top_antenna }}" type="text" class="form-control form-control-sm" id="top_antenna{{ $key }}" name="top_antenna{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="azimuth{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->azimuth }}" type="text" class="form-control form-control-sm" id="azimuth{{ $key }}" name="azimuth{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="suspension_height{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->suspension_height }}" type="text" class="form-control form-control-sm" id="suspension_height{{ $key }}" name="suspension_height{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="diapasons{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->diapasons }}" type="text" class="form-control form-control-sm" id="diapasons{{ $key }}" name="diapasons{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="direction_diagram{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->direction_diagram }}" type="text" class="form-control form-control-sm" id="direction_diagram{{ $key }}" name="direction_diagram{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="direction_diagram_2{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->direction_diagram_2 }}" type="text" class="form-control form-control-sm" id="direction_diagram_2{{ $key }}" name="direction_diagram_2{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="ku_antennas{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->ku_antennas }}" type="text" class="form-control form-control-sm" id="ku_antennas{{ $key }}" name="ku_antennas{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label for="bisector{{ $key }}" class="w-100">
                                                            <input type="checkbox" class="form-check-input" id="bisector{{ $key }}" name="bisector{{ $key }}" value="1" @if($antenna->bisector) checked @endif disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="electrical_tilt{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->electrical_tilt }}" type="text" class="form-control form-control-sm" id="electrical_tilt{{ $key }}" name="electrical_tilt{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="mechanical_tilt{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->mechanical_tilt }}" type="text" class="form-control form-control-sm" id="mechanical_tilt{{ $key }}" name="mechanical_tilt{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="sum_tilts{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->sum_tilts }}" type="text" class="form-control form-control-sm" id="sum_tilts{{ $key }}" name="sum_tilts{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="antenna_reception_id{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->antenna_reception?->title }}" type="text" class="form-control form-control-sm" id="antenna_reception_id{{ $key }}" name="antenna_reception_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="antenna_transmission_id{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->antenna_transmission?->title }}" type="text" class="form-control form-control-sm" id="antenna_transmission_id{{ $key }}" name="antenna_transmission_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="feeder_id{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->feeder?->title }}" type="text" class="form-control form-control-sm" id="feeder_id{{ $key }}" name="feeder_id{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="feeder_length{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->feeder_length }}" type="number" class="form-control form-control-sm" id="feeder_length{{ $key }}" name="feeder_length{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="latitude{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->latitude }}" type="text" class="form-control form-control-sm" id="latitude{{ $key }}" name="latitude{{ $key }}" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label for="longitude{{ $key }}" class="w-100">
                                                            <input value="{{ $antenna->longitude }}" type="text" class="form-control form-control-sm" id="longitude{{ $key }}" name="longitude{{ $key }}" disabled>
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
                                                        <th></th>
                                                        <th class="text-center">Тип MCU</th>
                                                        <th class="text-center">Номер MCU</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($baseStationApplication->baseStationPowerModules as $key => $mcu)
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <label for="mcu_type_id">
                                                                    <input value="{{ $mcu->mcu_type_id }}" type="text" class="form-control form-control-sm w-100" id="mcu_type_id" name="mcu_type_id" disabled>
                                                                </label>
                                                            </td>
                                                            <td class="text-center">
                                                                <label for="mcu_number">
                                                                    <input value="{{ $mcu->mcu_number }}" type="text" class="form-control form-control-sm w-100" id="mcu_number" name="mcu_number" disabled>
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
                                                @foreach($baseStationApplication->baseStationAntennaUnits as $rcuKey => $rcu)
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-center">
                                                            <label>
                                                                <input class="form-check-input" type="checkbox" value="1" @if($rcu->rru_control) checked @endif disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="antenna_id">
                                                                <input value="{{ $rcu->antenna_id }}" type="text" class="form-control form-control-sm" id="antenna_id" name="antenna_id" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="antenna_type">
                                                                <input value="{{ $rcu->antenna_type }}" type="text" class="form-control form-control-sm" id="antenna_type" name="antenna_type" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="sectors">
                                                                <input value="{{ $rcu->sectors }}" type="text" class="form-control form-control-sm" id="sectors" name="sectors" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="number_mcu_rru">
                                                                <input value="{{ $rcu->number_mcu_rru }}" type="text" class="form-control form-control-sm" id="number_mcu_rru" name="number_mcu_rru" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="type_mcu_rru">
                                                                <input value="{{ $rcu->type_mcu_rru }}" type="text" class="form-control form-control-sm" id="type_mcu_rru" name="type_mcu_rru" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="motor_id">
                                                                <input value="{{ $rcu->motor?->title }}" type="text" class="form-control form-control-sm" id="motor_id" name="motor_id" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="i_cable_id">
                                                                <input value="{{ $rcu->i_cable?->model }}" type="text" class="form-control form-control-sm" id="i_cable_id" name="i_cable_id" disabled>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label for="o_cable_id">
                                                                <input value="{{ $rcu->o_cable?->model }}" type="text" class="form-control form-control-sm" id="o_cable_id" name="o_cable_id" disabled>
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
                                            <input value="{{ $baseStationApplication->baseStationTransportNetworks->first()?->responsible_user_id }}" type="text" class="form-control form-control-sm w-auto" name="responsible_user_id" id="responsible_user_id" disabled>
                                        </div>
                                        <div class="col-12 ps-0 d-flex">
                                            <div class="col-4 d-flex align-items-center">
                                                <label for="gfc_node" class="mb-0 me-3">ГФК узла</label>
                                                <input value="{{ $baseStationApplication->baseStationTransportNetworks->first()?->gfc_node }}" type="text" class="form-control form-control-sm w-75" name="gfc_node" id="gfc_node" disabled>
                                            </div>
                                            <div class="col-5 d-flex align-items-center">
                                                <label for="correct_id" class="mb-0 me-3">ИД корректны</label>
                                                <input value="1" type="checkbox" class="form-check-input" name="correct_id" id="correct_id" @if($baseStationApplication->baseStationTransportNetworks->first()?->correct_id) checked @endif disabled>
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
                                                    <th></th>
                                                    <th class="text-center px-5">Тип ТС</th>
                                                    <th class="text-center">Комплект позиции</th>
                                                    <th class="text-center px-4">Статус линии</th>
                                                    <th class="text-center px-5">№ линии</th>
                                                    <th class="text-center">Арендодатель</th>
                                                    <th class="text-center">Тип оборудования</th>
                                                    <th class="text-center px-4">Интерфейс</th>
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
                                                    <th class="text-center px-5">Код позиции</th>
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
                                            @foreach($baseStationApplication->baseStationTransportNetworks as $network)
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <label class="w-100" for="vehicle_type_id">
                                                            <input type="text" class="form-control form-control-sm w-100" value="{{ $network->vehicle_type?->title }}" id="vehicle_type_id" name="vehicle_type_id" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="position_set_id">
                                                            <input type="text" class="form-control form-control-sm w-100" value="{{ $network->positionSet?->title }}" id="position_set_id" name="position_set_id" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="line_status_id">
                                                            <input type="text" class="form-control form-control-sm w-100" value="{{ $network->line_status?->title }}" id="line_status_id" name="line_status_id" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="line_number">
                                                            <input value="{{ $network->line_number }}" class="form-control form-control-sm w-100" name="line_number" id="line_number" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="landowner">
                                                            <input value="{{ $network->landowner }}" class="form-control form-control-sm w-100" name="landowner" id="landowner" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="equipment_type_id">
                                                            <input value="{{ $network->equipment_type?->designation }}" class="form-control form-control-sm w-100" name="equipment_type_id" id="equipment_type_id" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="interface">
                                                            <input value="{{ $network->interface }}" class="form-control form-control-sm w-100" name="interface" id="interface" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="tdm_band">
                                                            <input value="{{ $network->tdm_band }}" class="form-control form-control-sm w-100" name="tdm_band" id="tdm_band" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="ip_band">
                                                            <input value="{{ $network->ip_band }}" class="form-control form-control-sm w-100" name="ip_band" id="ip_band" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="generalization_frequency">
                                                            <input value="{{ $network->generalization_frequency }}" class="form-control form-control-sm w-100" name="generalization_frequency" id="generalization_frequency" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="speed">
                                                            <input value="{{ $network->speed }}" class="form-control form-control-sm w-100" name="speed" id="speed" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="antenna_diameter_in_ta">
                                                            <input value="{{ $network->antenna_diameter_in_ta }}" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_ta" id="antenna_diameter_in_ta" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="antenna_diameter_in_ta_2">
                                                            <input value="{{ $network->antenna_diameter_in_ta_2 }}" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_ta_2" id="antenna_diameter_in_ta_2" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="suspension_height_in_ta">
                                                            <input value="{{ $network->suspension_height_in_ta }}" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_ta" id="suspension_height_in_ta" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="suspension_height_in_ta_2">
                                                            <input value="{{ $network->suspension_height_in_ta_2 }}" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_ta_2" id="suspension_height_in_ta_2" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="power">
                                                            <input value="{{ $network->power }}" type="text" class="form-control form-control-sm w-100" name="power" id="power" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="azimuth_a">
                                                            <input value="{{ $network->azimuth_a }}" type="number" class="form-control form-control-sm w-100" name="azimuth_a" id="azimuth_a" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="reservation">
                                                            <input value="{{ $network->reservation }}" type="text" class="form-control form-control-sm w-100" name="reservation" id="reservation" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="node_code">
                                                            <input value="{{ $network->node_code }}" type="text" class="form-control form-control-sm w-100" name="node_code" id="node_code" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="response_title">
                                                            <input value="{{ $network->response_title }}" type="text" class="form-control form-control-sm w-100" name="response_title" id="response_title" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="item_code">
                                                            <input value="{{ $network->item_code }}" type="text" class="form-control form-control-sm w-100" name="item_code" id="item_code" readonly disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="response_latitude">
                                                            <input value="{{ $network->response_latitude }}" type="text" class="form-control form-control-sm w-100" name="response_latitude" id="response_latitude" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="response_latitude">
                                                            <input value="{{ $network->response_latitude }}" type="text" class="form-control form-control-sm w-100" name="response_latitude" id="response_latitude" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="response_longitude">
                                                            <input value="{{ $network->response_longitude }}" type="text" class="form-control form-control-sm w-100" name="response_longitude" id="response_longitude" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="antenna_diameter_in_tb">
                                                            <input value="{{ $network->antenna_diameter_in_tb }}" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_tb" id="antenna_diameter_in_tb" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="antenna_diameter_in_tb_2">
                                                            <input value="{{ $network->antenna_diameter_in_tb_2 }}" type="number" class="form-control form-control-sm w-100" name="antenna_diameter_in_tb_2" id="antenna_diameter_in_tb_2" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="suspension_height_in_tb">
                                                            <input value="{{ $network->suspension_height_in_tb }}" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_tb" id="suspension_height_in_tb" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="suspension_height_in_tb_2">
                                                            <input value="{{ $network->suspension_height_in_tb_2 }}" type="number" class="form-control form-control-sm w-100" name="suspension_height_in_tb_2" id="suspension_height_in_tb_2" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="azimuth_b">
                                                            <input value="{{ $network->azimuth_b }}" type="number" class="form-control form-control-sm w-100" name="azimuth_b" id="azimuth_b" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="change_date">
                                                            <input value="{{ $network->change_date }}" type="text" class="form-control form-control-sm w-100" name="change_date" id="change_date" disabled>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="w-100" for="range">
                                                            <input value="{{ $network->range }}" type="number" class="form-control form-control-sm w-100" name="range" id="range" disabled>
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
                    <div class="block-header bg-elegance-dark" role="tab" id="base-station-acceptors">
                        <a class="fw-semibold text-white" data-bs-toggle="collapse" data-bs-parent="#base-station-info" href="#base-station-acceptors-block" aria-expanded="true" aria-controls="base-station-position-diapasons-block">
                            Воркфлов база станции
                        </a>
                    </div>
                    <div id="base-station-acceptors-block" class="collapse show" role="tabpanel" aria-labelledby="base-station-acceptors">
                        <div class="block-content">
                            <div class="col-12 mb-4">
                                <div class="table-responsive text-nowrap">
                                    <table class="own-table w-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Воркфлов</th>
                                            <th class="text-center">Ведущий оператор</th>
                                            <th class="text-center">Коммент</th>
                                            <th class="text-center">Статус</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($baseStationApplication->baseStationAcceptors as $acceptor)
                                            <tr>
                                                <td>
                                                    <label for="workflow_id" class="w-100">
                                                        <input type="text" class="form-control form-control-sm w-100" id="workflow_id" name="workflow_id" value="{{ $acceptor->workflow->title }}" disabled>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="user_id" class="w-100">
                                                        <input type="text" class="form-control form-control-sm w-100" id="user_id" name="user_id" value="{{ $acceptor->user?->name }}" disabled>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="comment" class="w-100">
                                                        <input type="text" class="form-control form-control-sm w-100" id="comment" name="comment" value="{{ $acceptor->comment }}" disabled>
                                                    </label>
                                                </td>
                                                <td>{!! $acceptor->getActive() !!}</td>
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
</x-app-layout>
