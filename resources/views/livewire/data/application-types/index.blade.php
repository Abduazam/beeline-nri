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
                                <label for="for">
                                    <select wire:model="for" name="for" id="for" class="form-select form-select-sm">
                                        <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
                                        @foreach($fors as $for)
                                            <option value="{{ $for }}">{{ $for }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-6 ps-2 pe-0">
                                <x-filter.per-page />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end pe-0">

                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('application_types', 'id') }}</span>
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
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('application_types', 'aim') }}</th>
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('application_types', 'for') }}</th>
                        <th class="col-4">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('application_type_translations', 'name') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('application_types', 'created_at') }}</span>
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
                        <th class="col-1 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="row w-100 h-100 p-0 m-0">
                    @foreach($types as $type)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-2 d-flex align-items-center"><code>{{ $type->aim }}</code></td>
                            <td class="col-2 d-flex align-items-center"><code>{{ $type->for }}</code></td>
                            <td class="col-4 d-flex align-items-center">{{ $type->translations[0]->name }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $type->created_at }}</td>
                            <td class="col-1 d-flex justify-content-center align-items-center">
                                @can('edit application type')
                                    <livewire:data.application-types.edit :type="$type" :wire:key="'edit-application-type-' . $type->id"/>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($types instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $types->links() }}
            @endif
        </div>
    </div>
</div>

