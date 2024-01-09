<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-4 p-0">
                        <x-filter.search />
                    </div>
                    <div class="col-sm-8 text-end pe-0"></div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                    <tr class="row w-100 h-100 px-0 m-0">
                        <th class="col-1 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('table_column_names', 'id') }}</th>
                        <th class="col-5">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('table_column_names', 'table_name') }}</th>
                        <th class="col-3 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('table_column_names', 'column_name') }}</th>
                        <th class="col-3 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="row w-100 h-100 p-0 m-0">
                    @foreach($tables as $table)
                        <tr class="row w-100 h-100 px-0 m-0">
                            <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                            <td class="col-5 d-flex align-items-center">{{ $table->TABLE_NAME }}</td>
                            <td class="col-3 d-flex justify-content-center align-items-center">{{ $table->COLUMN_COUNT }}</td>
                            <td class="col-3 d-flex justify-content-center align-items-center">
                                @if($this->checkTable($table->TABLE_NAME))
                                    @can('create table column')
                                        <x-action.create route="{{ route('widget.table-columns.create', ['table_name' => $table->TABLE_NAME]) }}"/>
                                    @endcan
                                @endif
                                @if(!$this->checkTable($table->TABLE_NAME))
                                    @can('edit table column')
                                        <x-action.edit route="{{ route('widget.table-columns.edit', $table->TABLE_NAME) }}"/>
                                    @endcan
                                    @can('view table column')
                                        <x-action.show route="{{ route('widget.table-columns.show', $table->TABLE_NAME) }}"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if ($tables instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $tables->links() }}
            @endif
        </div>
    </div>
</div>

