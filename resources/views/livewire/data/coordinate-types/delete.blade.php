<div class="ms-1">
    @php
        $disabled = $errors->any() || !isset($this->type->name);
    @endphp

    <x-modal.opens.delete target="#modal-delete-coordinate-type-{{ $this?->type?->id }}" />

    <!-- Delete Coordinate Type Modal -->
    <div wire:ignore.self class="modal fade" id="modal-delete-coordinate-type-{{ $this?->type?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-coordinate-type-{{ $this?->type?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="coordinate-type" />
                        <div class="block-content fs-sm text-start">
                            <div class="col-12">
                                <div class="mb-4">
                                    <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('coordinate_types', 'name') }}</label>
                                    <input wire:model="type.name" type="text" class="form-control form-control-sm @error('type.name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name" disabled>
                                    @error('type.name')
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
