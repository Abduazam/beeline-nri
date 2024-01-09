<div>
    <x-modal.opens.delete target="#modal-delete-user-{{ $this->user->id }}"/>

    <!-- Delete User Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-delete-user-{{ $this->user->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-delete-user-{{ $this->user->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="user" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'name') }}</label>
                                <input value="{{ $this->user->name }}" type="text" class="form-control form-control-sm" id="name" name="name" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="role">{{ \App\Models\Widget\TextName::getTextTranslation('role') }}</label>
                                <input value="{{ $this->user->roles->first()?->name }}" type="text" class="form-control form-control-sm" id="role" name="role" disabled>
                            </div>
                        </div>
                        <x-modal.footer button="delete" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
