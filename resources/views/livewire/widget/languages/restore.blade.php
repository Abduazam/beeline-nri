<div>
    <x-modal.opens.restore target="#modal-restore-language-{{ $this->language->id }}" />

    <!-- Restore Role Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-restore-language-{{ $this?->language?->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-restore-language-{{ $this?->language?->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="restore" class="form-border-radius">
                        <x-modal.header action="restore" model="language" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="slug">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'slug') }}</label>
                                <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{ $this?->language?->slug }}" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'title') }}</label>
                                <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ $this?->language?->title }}" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="restore" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
