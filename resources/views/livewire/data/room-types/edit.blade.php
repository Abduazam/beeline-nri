<div>
    @php
        $disabled = $errors->any() || !isset($this->room_type->title);
    @endphp

    <x-modal.opens.edit target="#modal-edit-room-type-{{ $this?->room_type?->id }}" />

    <!-- Edit Room Type Modal -->
    <div wire:ignore.self class="modal fade" id="modal-edit-room-type-{{ $this?->room_type?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-room-type-{{ $this?->room_type?->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="update" class="form-border-radius">
                        <x-modal.header action="edit" model="room-type" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 px-0 mb-4">
                                    <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('room_types', 'title') }} <x-texts.required-sign /></label>
                                    <input wire:model="room_type.title" type="text" class="form-control form-control-sm @error('room_type.title'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                    @error('room_type.title')
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
