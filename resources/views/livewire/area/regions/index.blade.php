<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-3 p-0">
                        <x-filter.search placeholder="Search region"/>
                    </div>
                    <div class="col-sm-4">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-4 ps-0 pe-2">
                                <x-filter.branch/>
                            </div>
                            <div class="col-4 px-2">
                                <x-filter.status/>
                            </div>
                            <div class="col-4 ps-2 pe-0">
                                <x-filter.per-page/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end pe-0">
                        @can('create region')
                            <livewire:area.regions.create/>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('regions', 'id') }}</span>
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
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('regions', 'branch_id') }}</th>
                        <th class="col-5">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('region_translations', 'name') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('regions', 'created_at') }}</span>
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
                    @foreach($regions as $region)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-2 d-flex align-items-center">{{ $region->branch->translations[0]->name }}</td>
                            <td class="col-5 d-flex align-items-center">{{ $region->translations[0]->name }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $region->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore region')
                                        <livewire:area.regions.restore :region="$region" :wire:key="'restore-region-' . $region->id"/>
                                    @endcan
                                @else
                                    @can('edit region')
                                        <livewire:area.regions.edit :region="$region" :wire:key="'edit-region-' . $region->id"/>
                                    @endcan
                                    @can('delete region')
                                        <livewire:area.regions.delete :region="$region" :wire:key="'delete-region-' . $region->id"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($regions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $regions->links() }}
            @endif
        </div>
    </div>
</div>

