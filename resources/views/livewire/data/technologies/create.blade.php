<div>
    @php
        $disabled = $errors->any() || !isset($this->code) || !isset($this->name);
    @endphp

    <x-modal.opens.create target="#modal-create-technology" />

    <!-- Create Technology Modal -->
    <div wire:ignore.self class="modal fade" id="modal-create-technology" tabindex="-1" role="dialog" aria-labelledby="modal-create-technology" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="store" class="form-border-radius">
                        <x-modal.header action="create" model="technology" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="code">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'code') }} <x-texts.required-sign /></label>
                                    <input wire:model="code" type="text" class="form-control form-control-sm @error('code'){{ 'is-invalid mb-1' }}@enderror" id="code" name="code" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('code')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'name') }} <x-texts.required-sign /></label>
                                    <input wire:model="name" type="text" class="form-control form-control-sm @error('name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('name')
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
