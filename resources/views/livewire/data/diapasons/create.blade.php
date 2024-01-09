<div>
    @php
        $disabled = $errors->any() || !isset($this->technology_id) || !isset($this->band);
    @endphp

    <x-modal.opens.create target="#modal-create-diapason" />

    <!-- Create Diapason Modal -->
    <div wire:ignore.self class="modal fade" id="modal-create-diapason" tabindex="-1" role="dialog" aria-labelledby="modal-create-diapason" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="store" class="form-border-radius">
                        <x-modal.header action="create" model="diapason" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="technology_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'technology_id') }} <x-texts.required-sign /></label>
                                    <select wire:model="technology_id" class="form-select form-select-sm" id="technology_id" name="technology_id" style="width: 100%;">
                                        <option value="null" disabled readonly>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($technologies as $technology)
                                            <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('technology_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="band">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'band') }} <x-texts.required-sign /></label>
                                    <input wire:model="band" type="text" class="form-control form-control-sm @error('band'){{ 'is-invalid mb-1' }}@enderror" id="band" name="band" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('band')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="create" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
