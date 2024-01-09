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
                        @can('create general-contractor')
                            <livewire:data.general-contractors.create />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'id') }}</span>
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
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'inn') }}</th>
                        <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'title') }}</th>
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'address') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'created_at') }}</span>
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
                    @foreach($general_contractors as $general_contractor)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-2 d-flex align-items-center">{{ $general_contractor->inn }}</td>
                            <td class="col-3 d-flex align-items-center">{{ $general_contractor->title }}</td>
                            <td class="col-2 d-flex align-items-center">{{ $general_contractor->address }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $general_contractor->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore general-contractor')
                                        <livewire:data.general-contractors.restore :general_contractor="$general_contractor" :wire:key="'restore-general-contractor-' . $general_contractor->id"/>
                                    @endcan
                                @else
                                    @can('edit general-contractor')
                                        <livewire:data.general-contractors.edit :general_contractor="$general_contractor" :wire:key="'edit-general-contractor-' . $general_contractor->id"/>
                                    @endcan
                                    @can('delete general-contractor')
                                        <livewire:data.general-contractors.delete :general_contractor="$general_contractor" :wire:key="'delete-general-contractor-' . $general_contractor->id"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($general_contractors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $general_contractors->links() }}
            @endif
        </div>
    </div>
</div>

