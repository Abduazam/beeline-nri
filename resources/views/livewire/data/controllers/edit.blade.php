<div class="content">
    <form wire:submit.prevent="update">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-12 p-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark py-2">
                        <h3 class="block-title fs-sm text-white text-center mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('application-for') . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('add-new')) . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('controller')) }}</h3>
                    </div>
                    <div class="block-content pb-2">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-lg-4 col-sm-6 col-12 ps-0 mb-3">
                                <label class="form-label fs-sm" for="region_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'region_id') }} <x-texts.required-sign /></label>
                                <select wire:model.debounce.500ms="controller.region_id" class="form-select form-select-sm @error('region_id'){{ 'is-invalid mb-1' }}@enderror" name="region_id" id="region_id">
                                    <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 mb-3">
                                <label class="form-label fs-sm" for="number">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="controller.number" type="text" class="form-control form-control-sm @error('number'){{ 'is-invalid mb-1' }}@enderror" id="number" name="number">
                                @error('number')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 pe-0 mb-3">
                                <label class="form-label fs-sm" for="state_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'state_id') }} <x-texts.required-sign /></label>
                                <select wire:model.debounce.500ms="controller.state_id" class="form-select form-select-sm @error('state_id'){{ 'is-invalid mb-1' }}@enderror" name="state_id" id="state_id">
                                    <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 ps-0 mb-3">
                                <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'name') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="controller.name" type="text" class="form-control form-control-sm @error('name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name">
                                @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12 mb-3">
                                <label class="form-label fs-sm" for="gfk">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'gfk') }}</label>
                                <input wire:model.debounce.500ms="controller.gfk" type="text" class="form-control form-control-sm @error('gfk'){{ 'is-invalid mb-1' }}@enderror" id="gfk" name="gfk">
                                @error('gfk')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12 pe-0 mb-3">
                                <label class="form-label fs-sm" for="address">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'address') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="controller.address" type="text" class="form-control form-control-sm @error('address'){{ 'is-invalid mb-1' }}@enderror" id="address" name="address">
                                @error('address')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-12 ps-0 mb-3">
                                <label class="form-label fs-sm" for="position">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'position') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="controller.position" type="text" class="form-control form-control-sm @error('position'){{ 'is-invalid mb-1' }}@enderror" id="position" name="position">
                                @error('position')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-12 pe-0 mb-3">
                                <label class="form-label fs-sm" for="number_position">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number_position') }} <x-texts.required-sign /></label>
                                <input wire:model.debounce.500ms="controller.number_position" type="text" class="form-control form-control-sm @error('number_position'){{ 'is-invalid mb-1' }}@enderror" id="number_position" name="number_position">
                                @error('number_position')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <x-action.cancel route="{{ route('data.controllers.index') }}" />
                    <x-action.submit target="update" />
                </div>
            </div>
        </div>
    </form>
</div>
