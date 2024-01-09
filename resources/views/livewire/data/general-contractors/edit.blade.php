<div>
    @php
        $disabled = $errors->any() || !isset($this->general_contractor->title);
    @endphp

    <x-modal.opens.edit target="#modal-edit-general-contractor-{{ $this?->general_contractor?->id }}" />

    <!-- Edit General Contractor Modal -->
    <div wire:ignore.self class="modal fade" id="modal-edit-general-contractor-{{ $this?->general_contractor?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-general-contractor-{{ $this?->general_contractor?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="update" class="form-border-radius">
                        <x-modal.header action="edit" model="general-contractor" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="general_contractor_type_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'general_contractor_type_id') }} <x-texts.required-sign /></label>
                                    <select wire:model="general_contractor.general_contractor_general_contractor_type_id" type="text" class="form-select form-select-sm @error('general_contractor_type_id'){{ 'is-invalid mb-1' }}@enderror" id="general_contractor_type_id" name="general_contractor_type_id">
                                        <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('general_contractor_type_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="inn">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'inn') }} <x-texts.required-sign /></label>
                                    <input wire:model="general_contractor.inn" type="text" class="form-control form-control-sm @error('inn'){{ 'is-invalid mb-1' }}@enderror" id="inn" name="inn" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('inn')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'title') }} <x-texts.required-sign /></label>
                                    <input wire:model="general_contractor.title" type="text" class="form-control form-control-sm @error('title'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('title')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="address">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'address') }}</label>
                                    <input wire:model="general_contractor.address" type="text" class="form-control form-control-sm @error('address'){{ 'is-invalid mb-1' }}@enderror" id="address" name="address" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('address')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="edit" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
