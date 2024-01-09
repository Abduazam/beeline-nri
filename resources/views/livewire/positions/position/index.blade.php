<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-3">
                <div class="row w-100 h-100 m-0 p-0 fs-sm">
                    <div class="col-5 mb-2 p-0">
                        <div class="row w-100 p-0 m-0">
                            <div class="col-6 ps-0">
                                <div class="mb-1">
                                    <div class="space-y-2">
                                        <div class="form-check">
                                            <input wire:model="region_id" class="form-check-input"
                                                   type="checkbox" value="1" id="region_id" name="region_id">
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
                                                   value="1" id="area_id" name="area_id">
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
                                <label class="form-label" for="company_id">{{ \App\Models\Widget\TextName::getTextTranslation('companies') }}</label>
                                <select wire:model="company_id" class="form-select form-select-sm" id="company_id" name="company_id">
                                    <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="status">{{ \App\Models\Widget\TextName::getTextTranslation('statuses') }}</label>
                                <select wire:model="status" class="form-select form-select-sm" id="status" name="status">
                                    <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="application_type_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'application_type_id') }}</label>
                                <select wire:model="application_type_id" class="form-select form-select-sm" id="application_type_id" name="application_type_id">
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
                                        id="column_name" name="column_name">
                                    <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                    @foreach($columns as $column)
                                        <option value="{{ $column->column_name }}">{{ $column->translation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label w-100"></label>
                                @if(in_array($column_name, $select_columns))
                                    <label for="column_select_id" class="w-75 ps-0">
                                        <select wire:model="column_select_id" name="column_select_id" id="column_select_id" class="form-select form-select-sm w-100">
                                            <option value="0" selected>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                            @foreach($column_selects as $select)
                                                <option value="{{ $select->id }}">{{ $select->translations[0]->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                @endif
                                @if(in_array($column_name, $date_columns))
                                    <div class="row w-75 m-0 p-0">
                                        <label for="begin_date" class="w-50 ps-0 pe-2">
                                            <input wire:model.debounce.100ms="begin_date" type="date"
                                                   class="form-control form-control-sm w-100" id="begin_date"
                                                   name="begin_date">
                                        </label>
                                        <label for="end_date" class="w-50 pe-0 ps-2">
                                            <input wire:model.debounce.100ms="end_date" type="date"
                                                   class="form-control form-control-sm w-100" id="end_date"
                                                   name="end_date"
                                                   @if(isset($begin_date)) min="{{ $begin_date }}" @endif>
                                        </label>
                                    </div>
                                @endif
                                @if(in_array($column_name, $input_columns) || $column_name === '')
                                    <label for="search" class="w-75 ps-0">
                                        <input wire:model.debounce.100ms="search" type="text"
                                               class="form-control form-control-sm w-100" id="search"
                                               name="search"
                                               placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}"
                                               @if(!in_array($column_name, $input_columns)) disabled @endif>
                                    </label>
                                @endif
                            </div>
                            @can('create position')
                            <div class="col-2 pe-0">
                                <label class="form-label w-100"></label>
                                <x-action.create route="{{ route('positions.position.create') }}"/>
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
                            @if(auth()->user()->hasPermissionTo('accept position'))
                                <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'active') }}</th>
                            @endif
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'id') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'id') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'application_type_id') }}</th>
                            <th>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }}</th>
                            <th>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'address') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'status_id') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'created_at') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'user_id') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'comment') }}</th>
                            <th>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'latitude') }}</th>
                            <th>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'longitude') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'state_id') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($positions as $position)
                        @foreach($position->applications as $application)
                            <tr>
                                <td class="text-center">
                                    @can('view position')
                                        <x-action.show route="{{ route('positions.acceptor.show', $application) }}"/>
                                    @endcan
                                    @can('create position')
                                        @if($application->isPreparing() or $application->isCancelled())
                                            @if($application->isDeleting())
                                                <x-action.edit route="{{ route('positions.position.delete', $position) }}"/>
                                            @elseif($application->isCreating())
                                                <x-action.edit route="{{ route('positions.acceptor.edit', $application) }}"/>
                                            @elseif($application->isEditing())
                                                <x-action.edit route="{{ route('positions.position.edit', $position) }}"/>
                                            @endif
                                        @endif
                                    @endcan
                                    @can('delete position')
                                        @if(!$position->trashed() and $application->isExecuted() and !$position->hasApplicationDelete() and $application->isCreating())
                                            <x-action.delete route="{{ route('positions.position.delete', $position) }}"/>
                                        @endif
                                    @endcan
                                    @can('edit position')
                                        @if($application->isCreating() and $application->isExecuted() and !$position->hasApplicationDelete() and !$position->hasApplicationEdit())
                                            <x-action.change route="{{ route('positions.position.edit', $position) }}"/>
                                        @endif
                                    @endcan
                                </td>
                                @if(auth()->user()->hasPermissionTo('accept position'))
                                    <td class="text-center">{!! $application->acceptorActive() !!}</td>
                                @endif
                                <td class="text-center">{{ $application->id }}</td>
                                <td class="text-center">{{ $position->number }}</td>
                                <td>{{ $application->application_type->translations[0]->name }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->address }}</td>
                                <td class="text-center">
                                    {!! $application->getStatus() !!}
                                </td>
                                <td class="text-center">{{ $application->created_at }} </td>
                                <td class="text-center">{{ $application->user->name }} </td>
                                <td>{{ $application->comment }}</td>
                                <td>{{ $position->latitude }}</td>
                                <td>{{ $position->longitude }}</td>
                                <td class="text-center">{{ $position->state->translations[0]->name }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
