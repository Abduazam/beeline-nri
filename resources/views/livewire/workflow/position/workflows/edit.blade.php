<div>
    @php
        $disabled = $errors->any() || empty($this->workflow->title);
    @endphp

    <x-modal.opens.edit target="#modal-edit-position-workflow-{{ $this->workflow->id }}" />

    <!-- Edit Position Workflow Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-edit-position-workflow-{{ $this->workflow->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-edit-position-workflow-{{ $this->workflow->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="update" class="form-border-radius">
                        <x-modal.header action="edit" model="position-workflow" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'title') }} <x-texts.required-sign /></label>
                                <input wire:model="workflow.title" type="text" class="form-control form-control-sm @error('workflow.title'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                @error('workflow.title')
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
