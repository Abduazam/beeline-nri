<div class="ms-1">
    <x-modal.opens.delete target="#modal-delete-base-station-workflow-user-{{ $this->user->id }}" />

    <!-- Delete BaseStation Workflow User Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-delete-base-station-workflow-user-{{ $this->user->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-delete-base-station-workflow-user-{{ $this->user->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="user" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'name') }}</label>
                                <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ $this->user->user->name }}" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="delete" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
