<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-5 p-0">
                        <div class="row w-100 h-100 m-0 p-0">
                            <div class="col-9 ps-0 pe-2">
                                <x-filter.search />
                            </div>
                            <div class="col-3 pe-0 ps-2">
                                <x-filter.per-page />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 text-end pe-0">

                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th class="col-1 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('text_names', 'id') }}</th>
                        <th class="col-2">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('text_names', 'key') }}</th>
                        <th class="col-5">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('text_names', 'translation') }}</th>
                        <th class="col-2 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('text_names', 'created_at') }}</th>
                        <th class="col-2 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="row w-100 h-100 p-0 m-0">
                    @foreach($texts as $text)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-2 d-flex align-items-center">{{ $text->key }}</td>
                            <td class="col-5 d-flex align-items-center">{{ $text->translation }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">{{ $text->created_at }}</td>
                            <td class="col-2 d-flex justify-content-center align-items-center">
                                @can('edit text name')
                                    <x-action.show route="{{ route('widget.text-names.show', $text->key) }}"/>
                                @endcan
                                @can('edit text name')
                                    <x-action.edit route="{{ route('widget.text-names.edit', $text->key) }}"/>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($texts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $texts->links() }}
            @endif
        </div>
    </div>
</div>

