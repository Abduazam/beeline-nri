<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-4 p-0">
                        <x-filter.search />
                    </div>
                    <div class="col-sm-3">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-6 ps-0 pe-2">
                                <x-filter.status />
                            </div>
                            <div class="col-6 ps-2 pe-0">
                                <x-filter.per-page />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end pe-0">
                        @can('create role')
                            <x-action.add-new route="{{ route('user.roles.create') }}"/>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'id') }}</span>
                            @if($orderBy === 'id')
                                @if($orderDirection === 'asc')
                                    <i class="fa fa-angle-down small float-end"></i>
                                @else
                                    <i class="fa fa-angle-up small float-end"></i>
                                @endif
                            @else
                                <i class="fa fa-angle-down small float-end"></i>
                            @endif
                        </th>
                        <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'name') }}</th>
                        <th wire:click="sortBy('users')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TextName::getTextTranslation('users') }}</span>
                            @if($orderBy === 'users')
                                @if($orderDirection === 'asc')
                                    <i class="fa fa-angle-down small float-end"></i>
                                @else
                                    <i class="fa fa-angle-up small float-end"></i>
                                @endif
                            @else
                                <i class="fa fa-angle-down small float-end"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('permissions')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TextName::getTextTranslation('permissions') }}</span>
                            @if($orderBy === 'permissions')
                                @if($orderDirection === 'asc')
                                    <i class="fa fa-angle-down small float-end"></i>
                                @else
                                    <i class="fa fa-angle-up small float-end"></i>
                                @endif
                            @else
                                <i class="fa fa-angle-down small float-end"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('created_at')" class="col-lg-2 col-4 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('roles', 'created_at') }}</span>
                            @if($orderBy === 'created_at')
                                @if($orderDirection === 'asc')
                                    <i class="fa fa-angle-down small float-end"></i>
                                @else
                                    <i class="fa fa-angle-up small float-end"></i>
                                @endif
                            @else
                                <i class="fa fa-angle-down small float-end"></i>
                            @endif
                        </th>
                        <th class="col-lg-2 col-2 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="row w-100 h-100 p-0 m-0">
                    @foreach($roles as $role)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-3 d-flex align-items-center">{{ $role->name }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $role->users }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $role->permissions }}</td>
                            <td class="col-lg-2 col-4 d-flex justify-content-center align-items-center">{{ $role->created_at }}</td>
                            <td class="col-lg-2 col-2 d-flex justify-content-center align-items-center">
                                @can('view role')
                                    <x-action.show route="{{ route('user.roles.show', $role) }}"/>
                                @endcan
                                @if($role->id !== 1)
                                    @if($this->is_archived == 1)
                                        @can('restore role')
                                            <livewire:user.roles.restore :role="$role" :wire:key="'restore-role-' . $role->id"/>
                                        @endcan
                                    @else
                                        @can('edit role')
                                            <x-action.edit route="{{ route('user.roles.edit', $role) }}"/>
                                        @endcan
                                    @endif
                                    @canany(['delete role', 'force delete'])
                                        <livewire:user.roles.delete :role="$role" :wire:key="'delete-role-' . $role->id"/>
                                    @endcanany
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($roles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $roles->links() }}
            @endif
        </div>
    </div>
</div>
