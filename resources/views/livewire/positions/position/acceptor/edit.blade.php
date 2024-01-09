<div class="content pb-4">
    @php
        $choose_value = \App\Models\Widget\TextName::getTextTranslation('choose-value');
    @endphp

    <form wire:submit.prevent="submitForm">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-12 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark py-2">
                        <h3 class="block-title fs-sm text-white text-center mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('application-for') . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('add-new')) . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('position')) }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-lg-4 ps-0 mb-3">
                                <label class="form-label fs-sm" for="id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'id') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="application.position.id" type="text" class="form-control form-control-sm @error('application.position.id'){{ 'is-invalid mb-1' }}@enderror" id="id" name="id" readonly disabled>
                                @error('application.position.id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label fs-sm" for="source">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'source') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="application.position.source" type="text" class="form-control form-control-sm @error('application.position.source'){{ 'is-invalid mb-1' }}@enderror" id="source" name="source" readonly disabled>
                                @error('application.position.source')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 pe-0 mb-3">
                                <label class="form-label fs-sm" for="company_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'company_id') }} <x-texts.required-sign /></label>
                                <select wire:model.debounce.500ms="application.position.company_id" class="form-select form-select-sm @error('application.position.company_id'){{ 'is-invalid mb-1' }}@enderror" name="company_id" id="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('application.position.company_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 ps-0 mb-3">
                                <label class="form-label fs-sm" for="place_type_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'place_type_id') }} <x-texts.required-sign /></label>
                                <select wire:model="application.position.place_type_id" wire:blur="handlePlaceTypeId" class="form-select form-select-sm @error('application.position.place_type_id'){{ 'is-invalid mb-1' }}@enderror" name="place_type_id" id="place_type_id">
                                    <option value="0">{{ $choose_value }}</option>
                                    @foreach($place_types as $place_type)
                                        <option value="{{ $place_type->id }}">{{ $place_type->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('application.position.place_type_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label fs-sm" for="place_type_group_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'place_type_group_id') }} <x-texts.required-sign /></label>
                                <select wire:model.debounce.500ms="application.position.place_type_group_id" class="form-select form-select-sm @error('application.position.place_type_group_id'){{ 'is-invalid mb-1' }}@enderror" name="place_type_group_id" id="place_type_group_id">
                                    <option value="0">{{ $choose_value }}</option>
                                    @if(isset($place_type_groups) && count($place_type_groups) > 0)
                                        @foreach($place_type_groups as $place_type_group)
                                            <option value="{{ $place_type_group->id }}">{{ $place_type_group->translations[0]->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('application.position.place_type_group_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 pe-0 mb-3">
                                <label class="form-label fs-sm" for="purpose_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'purpose_id') }} <x-texts.required-sign /></label>
                                <select wire:model="application.position.purpose_id" class="form-select form-select-sm @error('urpose_id'){{ 'is-invalid mb-1' }}@enderror" name="purpose_id" id="purpose_id">
                                    <option value="0">{{ $choose_value }}</option>
                                    @foreach($purposes as $purpose)
                                        <option value="{{ $purpose->id }}">{{ $purpose->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('purpose_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 ps-0 mb-3">
                                <label class="form-label fs-sm" for="region_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'region_id') }} <x-texts.required-sign /></label>
                                <select wire:model="application.position.region_id" wire:blur="handleRegionId" class="form-select form-select-sm @error('application.position.region_id'){{ 'is-invalid mb-1' }}@enderror" name="region_id" id="region_id">
                                    <option value="0">{{ $choose_value }}</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('application.position.region_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label fs-sm" for="area_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'area_id') }}</label>
                                <select wire:model="application.position.area_id" class="form-select form-select-sm @error('application.position.area_id'){{ 'is-invalid mb-1' }}@enderror" name="area_id" id="area_id">
                                    <option value="0">{{ $choose_value }}</option>
                                    @if(isset($areas) && count($areas) > 0)
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->translations[0]->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('application.position.area_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 pe-0 mb-4">
                                <label class="form-label fs-sm" for="territory_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'territory_id') }} <x-texts.required-sign /></label>
                                <select wire:model="application.position.territory_id" class="form-select form-select-sm @error('application.position.territory_id'){{ 'is-invalid mb-1' }}@enderror" name="territory_id" id="territory_id">
                                    <option value="0">{{ $choose_value }}</option>
                                    @foreach($territories as $territory)
                                        <option value="{{ $territory->id }}">{{ $territory->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('application.position.territory_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-5 ps-0 mb-4">
                                <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }} <x-texts.required-sign /></label>
                                <input wire:model="application.position.name" type="text" class="form-control form-control-sm @error('name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name">
                                @error('application.position.name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-7 pe-0 mb-4">
                                <label class="form-label fs-sm" for="address">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'address') }} <x-texts.required-sign /></label>
                                <input wire:model="application.position.address" type="text" class="form-control form-control-sm @error('address'){{ 'is-invalid mb-1' }}@enderror" id="address" name="address">
                                @error('application.position.address')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block block-rounded">
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-lg-3 ps-0 mb-4">
                                <label class="form-label fs-sm" for="coordinate_id">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-system') }}: <x-texts.required-sign /></label>
                                <select wire:model="application.position.coordinate_id" class="form-select form-select-sm @error('application.position.coordinate_id'){{ 'is-invalid mb-1' }}@enderror" name="coordinate_id" id="coordinate_id">
                                    @foreach($coordinate_types as $coordinate_type)
                                        <option value="{{ $coordinate_type->id }}">{{ $coordinate_type->name }}</option>
                                    @endforeach
                                </select>
                                @error('application.position.coordinate_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-7 mb-4">
                                <div class="row w-100 m-0 p-0">
                                    <div class="col-6 d-flex align-items-center">
                                        <label class="col-form-label col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'latitude') }}: <span class="text-danger ms-1">*</span></label>
                                        <div class="col-8">
                                            <div class="col-12 mb-1">
                                                <label class="w-100 d-flex justify-content-between">
                                                    <div class="col-3">
                                                        <input wire:model="degree_values.latitude.degree" wire:change="handleUpdatedDegreeProperty('latitude')" type="number" class="form-control form-control-sm @error('degree_values.latitude.degree') is-invalid @enderror" @if($coordinate_type_id !== $degree) disabled @endif>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">°</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <input wire:model="degree_values.latitude.minute" wire:change="handleUpdatedDegreeProperty('latitude')" type="number" class="form-control form-control-sm @error('degree_values.latitude.minute') is-invalid @enderror" @if($coordinate_type_id !== $degree) disabled @endif>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">'</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <input wire:model="degree_values.latitude.second" wire:change="handleUpdatedDegreeProperty('latitude')" type="number" class="form-control form-control-sm @error('degree_values.latitude.second') is-invalid @enderror" @if($coordinate_type_id !== $degree) disabled @endif>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="w-100">
                                                    <input wire:model="coordinate_values.latitude.decimal" step="any" wire:blur="handleUpdatedProperty('latitude.decimal')" type="number" class="form-control form-control-sm @error('coordinate_values.latitude.decimal') is-invalid @enderror" @if($coordinate_type_id !== $decimal) disabled @endif>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <label class="col-form-label col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'longitude') }}: <span class="text-danger ms-1">*</span></label>
                                        <div class="col-8">
                                            <div class="col-12 mb-1">
                                                <label class="w-100 d-flex justify-content-between">
                                                    <div class="col-3">
                                                        <input wire:model="degree_values.longitude.degree" wire:change="handleUpdatedDegreeProperty('longitude')" type="number" class="form-control form-control-sm @error('degree_values.longitude.degree') is-invalid @enderror" @if($coordinate_type_id !== $degree) disabled @endif>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">°</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <input wire:model="degree_values.longitude.minute" wire:change="handleUpdatedDegreeProperty('longitude')" type="number" class="form-control form-control-sm @error('degree_values.longitude.minute') is-invalid @enderror" @if($coordinate_type_id !== $degree) disabled @endif>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">'</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <input wire:model="degree_values.longitude.second" wire:change="handleUpdatedDegreeProperty('longitude')" type="number" class="form-control form-control-sm @error('degree_values.longitude.second') is-invalid @enderror" @if($coordinate_type_id !== $degree) disabled @endif>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="w-100">
                                                    <input wire:model="coordinate_values.longitude.decimal" step="any" wire:blur="handleUpdatedProperty('longitude.decimal')" type="number" class="form-control form-control-sm @error('coordinate_values.longitude.decimal') is-invalid @enderror" @if($coordinate_type_id !== $decimal) disabled @endif>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 pe-0 mb-4">
                                <div class="space-y-2">
                                    <div class="form-check mb-0">
                                        <input wire:model="coordinate_type_id" class="form-check-input" type="radio" id="degree" name="coordinate_type_id" value="{{ $degree }}">
                                        <label class="form-check-label" for="degree">{{ \App\Models\Widget\TextName::getTextTranslation('degree') }}</label>
                                    </div>
                                    <div class="form-check mb-0">
                                        <input wire:model="coordinate_type_id" class="form-check-input" type="radio" id="decimal" name="coordinate_type_id" value="{{ $decimal }}">
                                        <label class="form-check-label" for="decimal">{{ \App\Models\Widget\TextName::getTextTranslation('decimal') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block block-rounded">
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-6 ps-0 mb-4">
                                <div class="row w-100 h-100 p-0 m-0">
                                    <div class="col-2 d-flex align-items-center ps-0">
                                        <label class="form-label fs-sm mb-0" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'state_id') }}</label>
                                    </div>
                                    <input type="text" value="{{ (\App\Models\Data\Position\State\State::where('aim', 'sketch')->first())->translations[0]->name }}" class="form-control form-control-sm w-auto" id="name" name="name" readonly disabled>
                                </div>
                            </div>
                            <div class="col-6 pe-0 mb-4">
                                <div class="row w-100 h-100 p-0 m-0 justify-content-end">
                                    <div class="col-3 d-flex align-items-center px-0">
                                        <label class="form-label fs-sm mb-0" for="address">{{ \App\Models\Widget\TextName::getTextTranslation('position-closing') }}</label>
                                    </div>
                                    <input type="text" class="form-control form-control-sm w-auto" id="address" name="address" readonly disabled>
                                </div>
                            </div>
                            <div class="col-12 px-0 mb-4">
                                <label for="comment" class="form-label fs-sm">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'comment') }}:</label>
                                <textarea wire:model="application.comment" class="form-control form-control-sm" id="comment" name="comment" rows="4" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <x-action.cancel route="{{ route('positions.position.index') }}" />
                    @if($application->isPreparing() or $application->isCancelled())
                        <x-action.archive target="submitForm" />
                        @can('send position')
                            <x-action.send target="submitForm" />
                        @endcan
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
