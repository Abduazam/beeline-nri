<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-4 p-0">
                        <x-filter.search placeholder="Search technology"/>
                    </div>
                    <div class="col-sm-3">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-6 ps-0 pe-2">
                                <x-filter.status/>
                            </div>
                            <div class="col-6 ps-2 pe-0">
                                <x-filter.per-page/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end pe-0">
                        @can('create technology')
                            <livewire:data.technologies.create />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'id') }}</span>
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
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'code') }}</th>
                        <th class="col-5">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'name') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('technologies', 'created_at') }}</span>
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
                    @foreach($technologies as $technology)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-2 d-flex align-items-center"><code>{{ $technology->code }}</code></td>
                            <td class="col-5 d-flex align-items-center">{{ $technology->name }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $technology->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore technology')
                                        <livewire:data.technologies.restore :technology="$technology" :wire:key="'restore-technology-' . $technology->id"/>
                                    @endcan
                                @else
                                    @can('edit technology')
                                        <livewire:data.technologies.edit :technology="$technology" :wire:key="'edit-technology-' . $technology->id"/>
                                    @endcan
                                    @can('delete technology')
                                        <livewire:data.technologies.delete :technology="$technology" :wire:key="'delete-technology-' . $technology->id"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($technologies instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $technologies->links() }}
            @endif
        </div>
    </div>
</div>

