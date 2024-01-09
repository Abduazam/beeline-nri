<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-12 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('info') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-12">
                                <label class="form-label fs-sm" for="table_name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('table_column_names', 'table_name') }}</label>
                                <input type="text" class="form-control" id="table_name" name="table_name" value="{{ $table }}" disabled>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-12">
                                <ul class="nav nav-tabs nav-tabs-alt fs-sm" role="tablist">
                                    @foreach($languages as $language)
                                        <li class="nav-item cursor-pointer" role="presentation">
                                            <a class="nav-link @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-{{ $language->slug }}-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-{{ $language->slug }}" role="tab" aria-controls="btabs-alt-static-{{ $language->slug }}" aria-selected="true">{{ $language->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="block-content tab-content px-0 fs-sm" >
                                    @foreach($languages as $language)
                                        <div class="tab-pane @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-{{ $language->slug }}" role="tabpanel" aria-labelledby="btabs-alt-static-{{ $language->slug }}-tab" tabindex="0">
                                            <div class="table-block">
                                                <table class="own-table w-100">
                                                    <thead class="row w-100 h-100 p-0 m-0">
                                                    <tr class="row w-100 h-100 px-0 m-0">
                                                        <th class="col-3">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('table_column_names', 'column_name') }}</th>
                                                        <th class="col-3">{{ \App\Models\Widget\TextName::getTextTranslation('column-type') }}</th>
                                                        <th class="col-6">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('table_column_names', 'translation') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="row w-100 h-100 p-0 m-0">
                                                    @foreach($columns as $column)
                                                        @if($language->slug === $column->locale)
                                                            <tr class="row w-100 h-100 px-0 m-0">
                                                                <td class="col-3 d-flex  align-items-center">{{ $column->column_name }}</td>
                                                                @foreach($types as $type)
                                                                    @if($column->column_name === $type->Field)
                                                                        <td class="col-3 d-flex align-items-center">{{ $type->Type }}</td>
                                                                    @endif
                                                                @endforeach
                                                                <td class="col-6 d-flex align-items-center">
                                                                    <label class="w-100">
                                                                        <input type="text" name="{{ $column->column_name }}" class="form-control form-control-sm w-100" value="{{ $column->translation }}" disabled>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-action.back route="{{ route('widget.table-columns.index') }}" />
    </div>
</x-app-layout>
