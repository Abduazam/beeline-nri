<div>
    <x-modal.opens.delete target="#modal-delete-role-{{ $this->role->id }}" />

    <!-- Delete Role modal -->
    <div wire:ignore.self class="modal fade" id="modal-delete-role-{{ $this->role->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-role-{{ $this->role->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 25%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="role" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'name') }}</label>
                                <input wire:model="role.name" type="text" class="form-control form-control-sm" id="name" name="name" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="delete" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
