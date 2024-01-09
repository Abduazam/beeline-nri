<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-4 p-0">
                        <x-filter.search placeholder="Search hardware room"/>
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
                        @can('create hardware-owner')
                            <livewire:data.hardware-owners.create />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('hardware_owners', 'id') }}</span>
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
                        <th class="col-7">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('hardware_owners', 'title') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('hardware_owners', 'created_at') }}</span>
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
                    @foreach($hardware_owners as $hardware_owner)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-7 d-flex align-items-center">{{ $hardware_owner->title }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $hardware_owner->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore hardware-owner')
                                        <livewire:data.hardware-owners.restore :hardware_owner="$hardware_owner" :wire:key="'restore-hardware-owner-' . $hardware_owner->id"/>
                                    @endcan
                                @else
                                    @can('edit hardware-owner')
                                        <livewire:data.hardware-owners.edit :hardware_owner="$hardware_owner" :wire:key="'edit-hardware-owner-' . $hardware_owner->id"/>
                                    @endcan
                                    @can('delete hardware-owner')
                                        <livewire:data.hardware-owners.delete :hardware_owner="$hardware_owner" :wire:key="'delete-hardware-owner-' . $hardware_owner->id"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($hardware_owners instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $hardware_owners->links() }}
            @endif
        </div>
    </div>
</div>

