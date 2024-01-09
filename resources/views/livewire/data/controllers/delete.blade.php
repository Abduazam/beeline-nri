<div class="d-inline-block">
    <x-modal.opens.delete target="#modal-delete-controller-{{ $this->controller->id }}"/>

    <!-- Delete Controller Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-delete-controller-{{ $this->controller->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-delete-controller-{{ $this->controller->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="controller" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'name') }}</label>
                                <input value="{{ $this->controller->name }}" type="text" class="form-control form-control-sm" id="name" name="name" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="number">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number') }}</label>
                                <input value="{{ $this->controller->number }}" type="text" class="form-control form-control-sm" id="number" name="number" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="delete" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
