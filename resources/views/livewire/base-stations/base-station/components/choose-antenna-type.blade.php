<div>
    @if(!is_null($antenna_type_name))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-choose-antenna-type{{ $key }}"><u>{{ $antenna_type_name }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-antenna-type{{ $key }}">Выбрать антенна</button>
    @endif

    <div wire:ignore.self class="modal fade" id="modal-choose-antenna-type{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal-choose-antenna-type{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-start">Выбор типа антеннов</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="filter-table pb-4">
                                <div class="row w-100 h-100 m-0 p-0">
                                    <div class="col-sm-5 p-0">
                                        <div class="row w-100 h-100 m-0 p-0">
                                            <div class="col-9 ps-0 pe-2">
                                                <x-filter.search />
                                            </div>
                                            <div class="col-3 ps-2 pe-0">
                                                <x-filter.per-page/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap mb-4">
                                <table class="own-table w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ИД</th>
                                        <th class="text-center">Наименования</th>
                                        <th class="text-center">Модел</th>
                                        <th class="text-center">Диапазоны</th>
                                        <th class="text-center">Диаграмма горизонталная</th>
                                        <th class="text-center">Диаграмма вертикалная</th>
                                        <th class="text-center">КУ усуления</th>
                                        <th class="text-center">Наклон электричиский</th>
                                        <th class="text-center">Наклон механичиский</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($antenna_types as $antenna_type)
                                        <tr wire:key="antenna-type-row{{ $antenna_type->id }}" wire:click="clickAntennaType({{ $antenna_type->id }})" class="choose-row @if($antenna_type_id === $antenna_type->id) bg-success text-white @endif">
                                            <td class="text-center">{{ $antenna_type->id }}</td>
                                            <td class="text-center">{{ $antenna_type->title }}</td>
                                            <td class="text-center">{{ $antenna_type->model }}</td>
                                            <td class="text-center">{{ $antenna_type->diapasons }}</td>
                                            <td class="text-center">{{ $antenna_type->horizontal_diagram }}</td>
                                            <td class="text-center">{{ $antenna_type->vertical_diagram }}</td>
                                            <td class="text-center">{{ $antenna_type->ku_antenna }}</td>
                                            <td class="text-center">{{ $antenna_type->electrical_tilt }}</td>
                                            <td class="text-center">{{ $antenna_type->mechanical_tilt }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($antenna_types instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $antenna_types->links() }}
                            @endif
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($antenna_type_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
