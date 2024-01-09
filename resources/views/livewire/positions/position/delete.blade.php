<div class="content pb-4">
    <form wire:submit.prevent="submitForm">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-12 px-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark py-2">
                        <h3 class="block-title fs-sm text-white text-center mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('position') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-lg-4 ps-0 mb-3">
                                <label class="form-label fs-sm" for="number">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->id }}" class="form-control form-control-sm" id="number" name="number" readonly disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label fs-sm" for="source">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'source') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->source }}" class="form-control form-control-sm" id="source" name="source" readonly disabled>
                            </div>
                            <div class="col-lg-4 pe-0 mb-3">
                                <label class="form-label fs-sm" for="company_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'company_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->company->translations[0]->name }}" class="form-control form-control-sm" id="company_id" name="company_id" readonly disabled>
                            </div>
                            <div class="col-lg-4 ps-0 mb-3">
                                <label class="form-label fs-sm" for="place_type_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'place_type_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->place_type->translations[0]->name }}" class="form-control form-control-sm" id="place_type_id" name="place_type_id" readonly disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label fs-sm" for="place_type_group_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'place_type_group_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->place_type_group->translations[0]->name }}" class="form-control form-control-sm" id="place_type_group_id" name="place_type_group_id" readonly disabled>
                            </div>
                            <div class="col-lg-4 pe-0 mb-3">
                                <label class="form-label fs-sm" for="purpose_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'purpose_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->purpose->translations[0]->name }}" class="form-control form-control-sm" id="purpose_id" name="purpose_id" readonly disabled>
                            </div>
                            <div class="col-lg-4 ps-0 mb-3">
                                <label class="form-label fs-sm" for="region_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'region_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->region->translations[0]->name }}" class="form-control form-control-sm" id="region_id" name="region_id" readonly disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label fs-sm" for="area_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'area_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->area?->translations[0]->name }}" class="form-control form-control-sm" id="area_id" name="area_id" readonly disabled>
                            </div>
                            <div class="col-lg-4 pe-0 mb-4">
                                <label class="form-label fs-sm" for="territory_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'territory_id') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->region->translations[0]->name }}" class="form-control form-control-sm" id="territory_id" name="territory_id" readonly disabled>
                            </div>
                            <div class="col-lg-5 ps-0 mb-4">
                                <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->name }}" class="form-control form-control-sm" id="name" name="name" readonly disabled>
                            </div>
                            <div class="col-lg-7 pe-0 mb-4">
                                <label class="form-label fs-sm" for="address">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'address') }} <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->address }}" class="form-control form-control-sm" id="address" name="address" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block block-rounded">
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-lg-4 ps-0 mb-4">
                                <label class="form-label fs-sm" for="coordinate_id">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-system') }}: <x-texts.required-sign /></label>
                                <input type="text" value="{{ $position->coordinate->name }}" class="form-control form-control-sm" id="coordinate_id" name="coordinate_id" readonly disabled>
                            </div>
                            <div class="col-lg-8 mb-4">
                                <div class="row w-100 m-0 p-0">
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="latitude" class="col-form-label fs-sm col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'latitude') }}: <x-texts.required-sign /></label>
                                        <div class="col-8">
                                            <div class="col-12 mb-1">
                                                @php
                                                    $data = explode(' ', (new \App\Helpers\Helper)->decimalToDegree($position->latitude));
                                                @endphp
                                                <div class="w-100 d-flex justify-content-between">
                                                    <div class="col-3">
                                                        <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[0] }}" readonly disabled>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">°</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[1] }}" readonly disabled>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">'</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[2] }}" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="w-100">
                                                    <input type="number" class="form-control form-control-sm" value="{{ $position->latitude }}" readonly disabled>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="longitude" class="col-form-label fs-sm col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'longitude') }}: <x-texts.required-sign /></label>
                                        <div class="col-8">
                                            <div class="col-12 mb-1">
                                                @php
                                                    $data = explode(' ', (new \App\Helpers\Helper)->decimalToDegree($position->longitude));
                                                @endphp
                                                <div class="w-100 d-flex justify-content-between">
                                                    <div class="col-3">
                                                        <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[0] }}" readonly disabled>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">°</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[1] }}" readonly disabled>
                                                    </div>
                                                    <div class="col-1">
                                                        <span class="ps-1 fs-lg">'</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[2] }}" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="w-100">
                                                    <input type="number" class="form-control form-control-sm" value="{{ $position->longitude }}" readonly disabled>
                                                </label>
                                            </div>
                                        </div>
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
                                    <div class="col-3 d-flex align-items-center ps-0">
                                        <label class="form-label fs-sm mb-0" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'state_id') }}</label>
                                    </div>
                                    <input type="text" value="{{ $position->state->translations[0]->name }}" class="form-control form-control-sm w-auto" id="name" name="name" readonly disabled>
                                </div>
                            </div>
                            <div class="col-6 pe-0 mb-4">
                                <div class="row w-100 h-100 p-0 m-0 justify-content-end">
                                    <div class="col-5 d-flex align-items-center px-0">
                                        <label class="form-label fs-sm mb-0" for="address">{{ \App\Models\Widget\TextName::getTextTranslation('position-closing') }}</label>
                                    </div>
                                    <div class="col-7">
                                        <input type="text" value="" class="form-control form-control-sm" id="address" name="address" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-0 mb-4">
                                <label for="comment" class="form-label fs-sm">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'comment') }}:</label>
                                <textarea wire:model="comment" class="form-control form-control-sm" id="comment" name="comment" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <x-action.cancel route="{{ route('positions.position.index') }}" />
                    @if(!$position->trashed())
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
