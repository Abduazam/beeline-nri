<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('info') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="col-12 p-0">
                            <div class="row w-100 h-100 p-0 m-0 align-items-center mb-4">
                                <div class="col-md-6 d-flex align-items-center ps-0">
                                    <label class="form-label w-auto mb-0 me-2" for="role">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'name') }}:</label>
                                    <input type="text" class="form-control form-control-sm w-75" id="role" name="role" placeholder="Role name" value="{{ $role->name }}" disabled>
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-end pe-0">
                                    <label class="form-label w-auto mb-0 me-2 col-4" for="created_at">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'created_at') }}:</label>
                                    <input type="text" class="form-control form-control-sm w-75" id="created_at" name="created_at" placeholder="Role created date" value="{{ $role->created_at }}" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <livewire:user.roles.users :role="$role" :wire:key="'users-role-' . $role->id" />
                    </div>
                </div>

                <x-action.back route="{{ route('user.roles.index') }}" />
            </div>
            <div class="col-md-4 pe-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('permissions') }} <span class="rounded-2 px-1 bg-white text-dark ms-1" style="font-size: 12px;">{{ count($role->permissions) }}</span></h3>
                    </div>
                    <div class="block-content">
                        <div class="d-flex flex-wrap w-100 h-100 p-0 mx-0 mb-4">
                            @foreach($role->permissions as $permission)
                                <button type="button" class="bg-corporate-dark text-white fs-sm border-0 rounded-2 me-1 mb-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $permission->content ? $permission->content : "No description" }}">{{ $permission->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
