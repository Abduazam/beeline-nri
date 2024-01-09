<div>
    @php
        $disabled = $errors->any() || !isset($this->diapason->technology_id) || !isset($this->diapason->band);
    @endphp

    <x-modal.opens.restore target="#modal-restore-diapason-{{ $this?->diapason?->id }}" />

    <!-- Restore Diapason Modal -->
    <div wire:ignore.self class="modal fade" id="modal-restore-diapason-{{ $this?->diapason?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-restore-diapason-{{ $this?->diapason?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="restore" class="form-border-radius">
                        <x-modal.header action="restore" model="diapason" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="technology_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'technology_id') }} <x-texts.required-sign /></label>
                                    <input value="{{ $diapason->technology->name }}" type="text" class="form-control form-control-sm" id="technology_id" name="technology_id" disabled>
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="band">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'band') }} <x-texts.required-sign /></label>
                                    <input wire:model="diapason.band" type="text" class="form-control form-control-sm @error('diapason.band'){{ 'is-invalid mb-1' }}@enderror" id="band" name="band" disabled>
                                    @error('diapason.band')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="restore" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
