<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-5 p-0">
                        <div class="row w-100 h-100 m-0 p-0">
                            <div class="col-9 ps-0 pe-2">
                                <x-filter.search />
                            </div>
                            <div class="col-3 pe-0 ps-2">
                                <x-filter.per-page/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 text-end pe-0">

                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('permissions', 'id') }}</span>
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
                        <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('permissions', 'name') }}</th>
                        <th wire:click="sortBy('roles')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TextName::getTextTranslation('roles') }}</span>
                            @if($orderBy === 'roles')
                                @if($orderDirection === 'asc')
                                    <i class="fa fa-angle-down small float-end"></i>
                                @else
                                    <i class="fa fa-angle-up small float-end"></i>
                                @endif
                            @else
                                <i class="fa fa-angle-down small float-end"></i>
                            @endif
                        </th>
                        <th class="col-4">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('permissions', 'content') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-lg-2 col-4 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('permissions', 'created_at') }}</span>
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
                        <th class="col-lg-1 col-2 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="row w-100 h-100 p-0 m-0">
                    @foreach($permissions as $permission)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-3 d-flex align-items-center">{{ $permission->name }}</td>
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $permission->roles }}</td>
                            <td class="col-4 d-flex align-items-center">{{ $permission->content }}</td>
                            <td class="col-lg-2 col-4 d-flex justify-content-center align-items-center">{{ $permission->created_at }}</td>
                            <td class="col-lg-1 col-2 d-flex justify-content-center align-items-center">
                                <livewire:user.permissions.edit :permission="$permission" :wire:key="'edit-permission-' . $permission->id"/>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($permissions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $permissions->links() }}
            @endif
        </div>
    </div>
</div>

