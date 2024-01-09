<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-3 p-0">
                        <x-filter.search placeholder="Search diapason"/>
                    </div>
                    <div class="col-sm-4">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-4 ps-0 pe-2">
                                <label for="technology_id" class="w-100">
                                    <select wire:model="technology_id" class="form-select form-select-sm w-100 filter-select" id="technology_id" name="technology_id">
                                        <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                        @foreach($technologies as $technology)
                                            <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-4 px-2">
                                <x-filter.status />
                            </div>
                            <div class="col-4 ps-2 pe-0">
                                <x-filter.per-page />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end pe-0">
                        @can('create diapason')
                            <livewire:data.diapasons.create/>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'id') }}</span>
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
                        <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'technology_id') }}</th>
                        <th class="col-4">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'band') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('diapasons', 'created_at') }}</span>
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
                    @foreach($diapasons as $diapason)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-3 d-flex align-items-center">{{ $diapason->technology->name }}</td>
                            <td class="col-4 d-flex align-items-center">{{ $diapason->band }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $diapason->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore diapason')
                                        <livewire:data.diapasons.restore :diapason="$diapason" :wire:key="'restore-diapason-' . $diapason->id"/>
                                    @endcan
                                @else
                                    @can('edit diapason')
                                        <livewire:data.diapasons.edit :diapason="$diapason" :wire:key="'edit-diapason-' . $diapason->id"/>
                                    @endcan
                                    @can('delete diapason')
                                        <livewire:data.diapasons.delete :diapason="$diapason" :wire:key="'delete-diapason-' . $diapason->id"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($diapasons instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $diapasons->links() }}
            @endif
        </div>
    </div>
</div>

