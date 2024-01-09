<div class="me-1">
    <x-modal.opens.restore target="#modal-restore-user-{{ $this->user->id }}" />

    <!-- Restore User Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-restore-user-{{ $this->user->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-restore-user-{{ $this->user->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="restore" class="form-border-radius">
                        <x-modal.header action="restore" model="user" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'name') }}</label>
                                <input value="{{ $this->user->name }}" type="text" class="form-control form-control-sm" id="name" name="name" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="role">{{ \App\Models\Widget\TextName::getTextTranslation('role') }}</label>
                                <input value="{{ $this->user->roles()->first()->name }}" type="text" class="form-control form-control-sm" id="role" name="role" placeholder="User role" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="restore" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
