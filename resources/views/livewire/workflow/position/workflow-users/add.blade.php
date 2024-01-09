<div>
    @php
        $disabled = $errors->any();
    @endphp

    <x-modal.opens.add target="#modal-add-user-position-workflow-{{ $this->workflow->id }}" icon="fa fa-user-plus" />

    <!-- Add User Position Workflow Modal -->
    <div wire:ignore.self
         class="modal fade"
         id="modal-add-user-position-workflow-{{ $this->workflow->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-add-user-position-workflow-{{ $this->workflow->id }}"
         aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="add" class="form-border-radius">
                        <x-modal.header action="add" model="user" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="users">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'title') }}</label>
                                <input type="text" value="{{ $this->workflow->title }}" class="form-control form-control-sm" disabled>
                            </div>
                            <div class="mb-4" wire:ignore>
                                <label class="form-label" for="users">{{ \App\Models\Widget\TextName::getTextTranslation('users') }}</label>
                                <select wire:model="data"
                                        class="js-select2 form-select"
                                        id="users-{{ $this->workflow->id }}" name="users"
                                        style="width: 100%; z-index: 9999;"
                                        multiple>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <x-modal.footer button="add" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#users-' + {{ $this->workflow->id }}).select2({
                dropdownParent: $("#modal-add-user-position-workflow-" + {{ $this->workflow->id }})
            }).on('change', function () {
                @this.set('data', $(this).val());
            });
        });
    </script>
@endpush
