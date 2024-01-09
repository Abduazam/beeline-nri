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
                            <div class="col-3 ps-0 pe-2">
                                <x-filter.status />
                            </div>
                            <div class="col-3 px-2">
                                <x-filter.per-page />
                            </div>
                            <div class="col-3 px-2">
                                <x-filter.branch />
                            </div>
                            <div class="col-3 ps-2 pe-0">
                                <x-filter.region :regions="$regions" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-end pe-0">
                        @can('create region')
                            <livewire:area.areas.create />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('areas', 'id') }}</span>
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
                        <th class="col-1">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('regions', 'branch_id') }}</th>
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('areas', 'region_id') }}</th>
                        <th class="col-4">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('area_translations', 'name') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('areas', 'created_at') }}</span>
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
                    @foreach($areas as $area)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-1 d-flex align-items-center">{{ $area->region->branch->translations[0]->name }}</td>
                            <td class="col-2 d-flex align-items-center">{{ $area->region->translations[0]->name }}</td>
                            <td class="col-4 d-flex align-items-center">{{ $area->translations[0]->name }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $area->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore area')
                                        <livewire:area.areas.restore :area="$area" :wire:key="'restore-area-' . $area->id"/>
                                    @endcan
                                @else
                                    @can('edit area')
                                        <livewire:area.areas.edit :area="$area" :wire:key="'edit-area-' . $area->id"/>
                                    @endcan
                                    @can('delete area')
                                        <livewire:area.areas.delete :area="$area" :wire:key="'delete-area-' . $area->id"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($areas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $areas->links() }}
            @endif
        </div>
    </div>
</div>

