<div>
    @php
        $disabled = $errors->any() || empty($this->language->title);
    @endphp

    <x-modal.opens.edit target="#modal-edit-language-{{ $this?->language?->id }}" />

    <!-- Edit Language Modal -->
    <div wire:ignore.self class="modal fade" id="modal-edit-language-{{ $this?->language?->id }}" tabindex="-1"
         role="dialog" aria-labelledby="modal-edit-language-{{ $this?->language?->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="update" class="form-border-radius">
                        <x-modal.header action="edit" model="language" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="slug">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'slug') }} <x-texts.required-sign /></label>
                                <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{ $this?->language?->slug }}" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'title') }} <x-texts.required-sign /></label>
                                <input wire:model="language.title" type="text" class="form-control form-control-sm @error('language.title'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                @error('language.title')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <x-modal.footer button="edit" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
