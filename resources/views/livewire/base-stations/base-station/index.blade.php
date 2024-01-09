<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-3">
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-5 mb-2 p-0">
                        <div class="row w-100 p-0 m-0">
                            <div class="col-6 ps-0">
                                <div class="mb-1">
                                    <div class="space-y-2">
                                        <div class="form-check">
                                            <input wire:model="region_id" class="form-check-input"
                                                   type="checkbox" value="1" id="region_id" name="region_id" disabled>
                                            <label class="form-check-label"
                                                   for="region_id">{{ \App\Models\Widget\TextName::getTextTranslation('all') . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('regions')) }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <label for="regions" class="w-100">
                                        <select wire:model="chosen_regions" class="form-select form-select-sm"
                                                id="regions" name="regions" data-placeholder="Choose regions"
                                                multiple @if($region_id) disabled @endif>
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->translations[0]->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <div class="space-y-2">
                                        <div class="form-check">
                                            <input wire:model="area_id" class="form-check-input" type="checkbox"
                                                   value="1" id="area_id" name="area_id" disabled>
                                            <label class="form-check-label"
                                                   for="area_id">{{ \App\Models\Widget\TextName::getTextTranslation('all') . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('areas')) }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <label for="areas" class="w-100">
                                        <select wire:model="chosen_areas" class="form-select form-select-sm"
                                                id="areas" name="areas" data-placeholder="Choose areas" multiple
                                                @if($area_id) disabled @endif>
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->translations[0]->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 mb-2 p-0">
                        <div class="row w-100 mx-0 mb-3 p-0">
                            <div class="col-3">
                                <label class="form-label" for="status">{{ \App\Models\Widget\TextName::getTextTranslation('statuses') }}</label>
                                <select wire:model="status" class="form-select form-select-sm" id="status" name="status" disabled>
                                    <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="application_type_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'application_type_id') }}</label>
                                <select wire:model="application_type_id" class="form-select form-select-sm" id="application_type_id" name="application_type_id" disabled>
                                    @foreach($application_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 pe-0">
                                <label class="form-label" for="perPage">{{ \App\Models\Widget\TextName::getTextTranslation('per-page') }}</label>
                                <x-filter.per-page/>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="column_name"></label>
                                <select wire:model="column_name" class="form-select form-select-sm"
                                        id="column_name" name="column_name"  disabled>
                                    <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label w-100"></label>
                                <label for="search" class="w-75 ps-0">
                                    <input wire:model.debounce.100ms="search" type="text"
                                           class="form-control form-control-sm w-100" id="search"
                                           name="search"
                                           placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                </label>
                            </div>
                            @can('create base-station')
                                <div class="col-2 pe-0">
                                    <label class="form-label w-100"></label>
                                    <x-action.create route="{{ route('base-stations.base-station.create') }}"/>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap mb-4">
                <table class="own-table w-100">
                    <thead>
                    <tr>
                        <th class="text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                        <th class="text-center">Номер</th>
                        <th class="text-center">Телеком. станд.</th>
                        <th class="text-center">Номер позиции</th>
                        <th class="text-center">Наименование</th>
                        <th class="text-center">Адрес</th>
                        <th class="text-center">Тип</th>
                        <th class="text-center">Собственник</th>
                        <th class="text-center">Год</th>
                        <th class="text-center">ИД Проекта </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($base_stations as $base_station)
                        @foreach($base_station->applications as $application)
                            <tr>
                                <td class="text-center">
                                    <x-action.show route="{{ route('base-stations.base-station.show', $application) }}"/>
                                </td>
                                <td class="text-center">{{ $application->getDiapasonNumbers() }}</td>
                                <td class="text-center">{{ $application->getTechnologyNames() }}</td>
                                <td class="text-center">{{ $base_station->position->number }}</td>
                                <td class="text-center">{{ $base_station->position->name }}</td>
                                <td class="text-center text-wrap" style="min-width: 300px!important;">{{ $base_station->position->address }}</td>
                                <td class="text-center">{{ $application->application_type->translations[0]->name }}</td>
                                <td class="text-center">{{ $application->user->name }}</td>
                                <td class="text-center">{{ $base_station->year }}</td>
                                <td class="text-center">{{ $application->id }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($base_stations instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $base_stations->links() }}
            @endif
        </div>
    </div>
</div>
