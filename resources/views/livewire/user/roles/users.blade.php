<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-sm-5 ps-0">
                <x-filter.search placeholder="Search name or email" />
            </div>
            <div class="col-sm-4 p-0">
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-6 ps-0 pe-2">
                        <x-filter.status />
                    </div>
                    <div class="col-6 ps-2 pe-0">
                        <x-filter.per-page />
                    </div>
                </div>
            </div>
            @can('create user')
                <div class="col-sm-3 text-end pe-0">
                    <x-action.add-new route="{{ route('user.users.create') }}" />
                </div>
            @endcan
        </div>
    </div>
    <div class="table-block pb-4">
        <table class="own-table w-100">
            <thead class="row w-100 h-100 p-0 m-0">
            <tr class="row w-100 h-100 px-0 m-0">
                <th class="col-1 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'image') }}</th>
                <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'name') }}</th>
                <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'email') }}</th>
                <th wire:click="sortBy('created_at')" class="col-3 d-flex justify-content-center align-items-center cursor-pointer">
                    <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'created_at') }}</span>
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
                <th class="col-2 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
            </tr>
            </thead>
            <tbody class="row w-100 h-100 p-0 m-0">
            @foreach($users as $user)
                <tr class="row w-100 h-100 px-0 m-0">
                    <td class="col-1 d-flex justify-content-center align-items-center">{!! $user->getImage() !!}</td>
                    <td class="col-3 d-flex align-items-center">{{ $user->name }}</td>
                    <td class="col-3 d-flex align-items-center">{{ $user->email }}</td>
                    <td class="col-3 d-flex justify-content-center align-items-center">{{ $user->created_at }}</td>
                    <td class="col-2 d-flex justify-content-center align-items-center">
                        @if($this->is_archived == 1)
                            @can('restore user')
                                <livewire:user.users.restore :user="$user" :wire:key="'restore-user-' . $user->id"/>
                            @endcan
                        @else
                            @can('view user')
                                <x-action.show route="{{ route('user.users.show', $user) }}"/>
                            @endcan
                            @can('edit user')
                                <x-action.edit route="{{ route('user.users.edit', $user) }}"/>
                            @endcan
                        @endif
                        @canany(['delete user', 'force delete user'])
                            @if($user->id != 1)
                                <livewire:user.users.delete :user="$user" :wire:key="'delete-user-' . $user->id"/>
                            @endif
                        @endcanany
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if ($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $users->links() }}
    @endif
</div>
