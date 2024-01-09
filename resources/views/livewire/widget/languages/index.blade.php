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
                                <x-filter.status />
                            </div>
                            <div class="col-6 ps-2 pe-0">
                                <x-filter.per-page />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-end pe-0">
                        @can('create language')
                            <livewire:widget.languages.create />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th wire:click="sortBy('id')" class="col-1 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'id') }}</span>
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
                        <th class="col-1 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'slug') }}</th>
                        <th class="col-6">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'title') }}</th>
                        <th wire:click="sortBy('created_at')" class="col-2 d-flex justify-content-center align-items-center cursor-pointer">
                            <span class="pe-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('languages', 'created_at') }}</span>
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
                    @foreach($languages as $language)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $language->slug }}</td>
                            <td class="col-6 d-flex align-items-center">{{ $language->title }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $language->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @if($this->is_archived == 1)
                                    @can('restore language')
                                        <livewire:widget.languages.restore :language="$language" :wire:key="'restore-language-' . $language->id"/>
                                    @endcan
                                @else
                                    @can('edit language')
                                        <livewire:widget.languages.edit :language="$language" :wire:key="'edit-language-' . $language->id"/>
                                    @endcan
                                @endif
                                @canany(['delete language', 'force language'])
                                    <livewire:widget.languages.delete :language="$language" :wire:key="'delete-language-' . $language->id"/>
                                @endcanany
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($languages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $languages->links() }}
            @endif
        </div>
    </div>
</div>

