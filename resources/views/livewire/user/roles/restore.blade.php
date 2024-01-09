<div class="me-1">
    <x-modal.opens.restore target="#modal-restore-role-{{ $this->role->id }}" />

    <!-- Restore Role Modal -->
    <div wire:ignore.self class="modal fade" id="modal-restore-role-{{ $this->role->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-restore-role-{{ $this->role->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 25%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="restore" class="form-border-radius">
                        <x-modal.header action="restore" model="role" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'name') }}</label>
                                <input wire:model="role.name" type="text" class="form-control form-control-sm" id="name" name="name" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="restore" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
