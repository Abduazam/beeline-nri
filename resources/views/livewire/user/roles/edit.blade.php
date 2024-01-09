<div class="content">
    <form wire:submit.prevent="update">
        <div class="block block-rounded">
            <div class="block-content">
                <div class="row mb-4">
                    <div class="col-6">
                        <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'name') }} <x-texts.required-sign /></label>
                        <input wire:model.debounce.500ms="role.name" type="text" class="form-control @error('role.name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                        @error('role.name')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6" wire:ignore>
                        <label class="form-label fs-sm" for="permissions">{{ \App\Models\Widget\TextName::getTextTranslation('permissions') }}</label>
                        <select wire:model="permissions" class="js-select2 form-select @error('permissions'){{ 'is-invalid mb-1' }}@enderror" id="permissions" name="permissions" data-placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}" multiple>
                            <option></option>
                            @foreach($accesses as $access)
                                <option value="{{ $access->id }}">{{ $access->name }}</option>
                            @endforeach
                        </select>
                        @error('permissions')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <x-action.cancel route="{{ route('user.roles.index') }}" />
            <x-action.submit target="update" />
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#permissions').select2().on('change', function () {
            @this.set('permissions', $(this).val());
            });
        });
    </script>
@endpush
