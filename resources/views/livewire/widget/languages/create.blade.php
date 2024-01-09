<div>
    @php
        $disabled = $errors->any() || empty($this->slug) || empty($this->title);
    @endphp

    <x-modal.opens.create target="#modal-create-language" />

    <!-- Create Language Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-create-language"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-create-language"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="store" class="form-border-radius">
                        <x-modal.header action="create" model="language" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="slug">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'slug') }} <x-texts.required-sign /></label>
                                <input wire:model="slug" type="text" class="form-control form-control-sm @error('slug'){{ 'is-invalid mb-1' }}@enderror" id="slug" name="slug" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                @error('slug')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'title') }} <x-texts.required-sign /></label>
                                <input wire:model="title" type="text" class="form-control form-control-sm @error('title'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                @error('title')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <x-modal.footer button="create" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
