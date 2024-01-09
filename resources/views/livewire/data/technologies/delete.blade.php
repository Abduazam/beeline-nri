<div class="ms-1">
    @php
        $disabled = $errors->any() || !isset($this->technology->name) || !isset($this->technology->code);
    @endphp

    <x-modal.opens.delete target="#modal-delete-technology-{{ $this?->technology?->id }}" />

    <!-- Delete Technology Modal -->
    <div wire:ignore.self class="modal fade" id="modal-delete-technology-{{ $this?->technology?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-technology-{{ $this?->technology?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="technology" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="code">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'code') }} <x-texts.required-sign /></label>
                                    <input wire:model="technology.code" type="text" class="form-control form-control-sm @error('technology.code'){{ 'is-invalid mb-1' }}@enderror" id="code" name="code" disabled>
                                    @error('technology.code')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'name') }} <x-texts.required-sign /></label>
                                    <input wire:model="technology.name" type="text" class="form-control form-control-sm @error('technology.name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name" disabled>
                                    @error('technology.name')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="delete" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
