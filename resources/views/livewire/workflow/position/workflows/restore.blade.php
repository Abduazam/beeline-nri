<div>
    <x-modal.opens.restore target="#modal-restore-position-workflow-{{ $this->workflow->id }}" />

    <!-- Restore Position Workflow Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-restore-position-workflow-{{ $this->workflow->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-restore-position-workflow-{{ $this->workflow->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="restore" class="form-border-radius">
                        <x-modal.header action="restore" model="position-workflow" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'title') }}</label>
                                <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ $this->workflow->title }}" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="restore" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
