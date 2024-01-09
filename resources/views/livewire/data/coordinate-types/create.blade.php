<div>
    @php
        $disabled = $errors->any() || !isset($this->name);
    @endphp

    <x-modal.opens.create target="#modal-create-coordinate-type" />

    <!-- Create Coordinate Type Modal -->
    <div wire:ignore.self class="modal fade" id="modal-create-coordinate-type" tabindex="-1" role="dialog" aria-labelledby="modal-create-coordinate-type" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="store" class="form-border-radius">
                        <x-modal.header action="create" model="coordinate-type" />
                        <div class="block-content fs-sm text-start">
                            <div class="col-12">
                                <div class="mb-4">
                                    <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('coordinate_types', 'name') }} <x-texts.required-sign /></label>
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
