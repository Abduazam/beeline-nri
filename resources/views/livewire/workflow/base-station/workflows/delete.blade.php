<div class="ms-1">
    <x-modal.opens.delete target="#modal-delete-base-station-workflow-{{ $this->workflow->id }}" />

    <!-- Delete BaseStation Workflow Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-delete-base-station-workflow-{{ $this->workflow->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-delete-base-station-workflow-{{ $this->workflow->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="base-station-workflow" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('base_station_workflows', 'title') }}</label>
                                <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ $this->workflow->title }}" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="delete" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
