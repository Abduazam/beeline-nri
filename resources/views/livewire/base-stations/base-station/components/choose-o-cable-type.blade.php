<div>
    @if(!is_null($this->o_cable_model))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-choose-o-cable{{ $key }}"><u>{{ $this->o_cable_model }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-o-cable{{ $key }}">Выбрать i кабель</button>
    @endif

    <div wire:ignore.self class="modal fade" id="modal-choose-o-cable{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal-choose-o-cable{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-start">O кабелы</h3>
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
                                        <th class="text-center">Название</th>
                                        <th class="text-center">Модел</th>
                                        <th class="text-center">Производитель</th>
                                        <th class="text-center">Длина</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ocables as $ocable)
                                        <tr wire:key="o-cable-row{{ $ocable->id }}" wire:click="clickOCable({{ $ocable->id }})" class="choose-row @if($o_cable_id === $ocable->id) bg-success text-white @endif">
                                            <td class="text-center">{{ $ocable->title }}</td>
                                            <td class="text-center">{{ $ocable->model }}</td>
                                            <td class="text-center">{{ $ocable->manufacturer }}</td>
                                            <td class="text-center">{{ $ocable->length }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($ocables instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $ocables->links() }}
                            @endif
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($o_cable_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
