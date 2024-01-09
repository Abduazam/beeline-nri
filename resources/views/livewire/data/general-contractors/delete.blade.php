<div class="ms-1">
    @php
        $disabled = $errors->any() || !isset($this->general_contractor->title);
    @endphp

    <x-modal.opens.delete target="#modal-delete-general-contractor-{{ $this?->general_contractor?->id }}" />

    <!-- Delete General Contractor Modal -->
    <div wire:ignore.self class="modal fade" id="modal-delete-general-contractor-{{ $this?->general_contractor?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-general-contractor-{{ $this?->general_contractor?->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="general-contractor" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 px-0 mb-4">
                                    <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'title') }} <x-texts.required-sign /></label>
                                    <input wire:model="general_contractor.title" type="text" class="form-control form-control-sm @error('general_contractor.name'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" disabled>
                                    @error('general_contractor.title')
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
