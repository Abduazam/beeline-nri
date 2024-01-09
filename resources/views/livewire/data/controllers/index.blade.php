<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-3 p-0">
                        <x-filter.search />
                    </div>
                    <div class="col-sm-5">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-4 ps-0 pe-2">
                                <x-filter.region :regions="$regions" />
                            </div>
                            <div class="col-4">
                                <x-filter.status />
                            </div>
                            <div class="col-4 ps-2 pe-0">
                                <x-filter.per-page />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-end pe-0">
                        @can('create controller')
                            <x-action.add-new route="{{ route('data.controllers.create') }}" />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap pb-4">
                <table class="own-table w-100">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('id')" class="d-flex justify-content-center align-items-center cursor-pointer">
                                <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'id') }}</span>
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
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'region_id') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'name') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'gfk') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number_position') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'position') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'address') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'state_id') }}</th>
                            <th class="text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($controllers as $controller)
                        <tr>
                            <td class="text-center">{{ $controller->id }}</td>
                            <td class="text-center">{{ $controller->region->translations[0]->name }}</td>
                            <td class="text-center">{{ $controller->number }}</td>
                            <td class="text-center">{{ $controller->name }}</td>
                            <td class="text-center">{{ $controller->gfk }}</td>
                            <td class="text-center">{{ $controller->number_position }}</td>
                            <td class="text-center">{{ $controller->position }}</td>
                            <td class="text-center">{{ $controller->address }}</td>
                            <td class="text-center">{{ $controller->state->translations[0]->name }}</td>
                            <td class="text-center">
                                @if($this->is_archived == 1)
                                    @can('restore controller')
                                        <livewire:data.controllers.restore :controller="$controller" :wire:key="'restore-controller-' . $controller->id"/>
                                    @endcan
                                @else
                                    @can('view controller')
                                        <x-action.show route="{{ route('data.controllers.show', $controller) }}"/>
                                    @endcan
                                    @can('edit controller')
                                        <x-action.edit route="{{ route('data.controllers.edit', $controller) }}"/>
                                    @endcan
                                @endif
                                @canany(['delete controller', 'force delete controller'])
                                    <livewire:data.controllers.delete :controller="$controller" :wire:key="'delete-controller-' . $controller->id"/>
                                @endcanany
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($controllers instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $controllers->links() }}
            @endif
        </div>
    </div>
</div>

