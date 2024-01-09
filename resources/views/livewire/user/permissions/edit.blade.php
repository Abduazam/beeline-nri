<div>
    @php
        $disabled = $errors->any() || empty($this->permission->content);
    @endphp

    <x-modal.opens.edit target="#modal-edit-permission-{{ $this->permission->id }}" />

    <!-- Edit Permission Modal -->
    <div wire:ignore.self class="modal fade" id="modal-edit-permission-{{ $this->permission->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-permission-{{ $this->permission->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="update" class="form-border-radius">
                        <x-modal.header action="edit" model="permission" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('permissions', 'name') }}</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $this->permission->name }}" placeholder="Permission name" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="content">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('permissions', 'content') }} <x-texts.required-sign /></label>
                                <textarea wire:model="permission.content" class="form-control form-control-sm @error('permission.content'){{ 'is-invalid mb-1' }}@enderror" id="content" name="content" rows="4" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}"></textarea>
                                @error('permission.content')
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
