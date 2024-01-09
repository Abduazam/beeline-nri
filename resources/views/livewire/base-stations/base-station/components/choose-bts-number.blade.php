<div class="ms-3">
    <a class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-sector-rru-number">
        <h3 class="block-title">{{ \App\Models\Widget\TextName::getTextTranslation('choose') }}</h3>
    </a>
    <div wire:ignore.self class="modal fade" id="modal-choose-sector-rru-number" tabindex="-1" role="dialog" aria-labelledby="modal-choose-sector-rru-number" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    {{--                    <form wire:submit.prevent="choose" class="form-border-radius">--}}
                    {{--                        <div class="block-header block-header-default">--}}
                    {{--                            <h3 class="block-title">{{ \App\Models\Widget\TextName::getTextTranslation('positions') }}</h3>--}}
                    {{--                            <div class="block-options">--}}
                    {{--                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">--}}
                    {{--                                    <i class="fa fa-times"></i>--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="block-content fs-sm">--}}
                    {{--                            <div class="filter-table pb-4">--}}
                    {{--                                <div class="row w-100 h-100 m-0 p-0">--}}
                    {{--                                    <div class="col-sm-5 p-0">--}}
                    {{--                                        <div class="row w-100 h-100 m-0 p-0">--}}
                    {{--                                            <div class="col-9 ps-0 pe-2">--}}
                    {{--                                                <x-filter.search />--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="col-3 ps-2 pe-0">--}}
                    {{--                                                <x-filter.per-page/>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="table-responsive text-nowrap mb-4">--}}
                    {{--                                <table class="own-table w-100">--}}
                    {{--                                    <thead>--}}
                    {{--                                    <tr>--}}
                    {{--                                        <th>Называние</th>--}}
                    {{--                                        <th>Модель</th>--}}
                    {{--                                        <th>Раслр. БС </th>--}}
                    {{--                                    </tr>--}}
                    {{--                                    </thead>--}}
                    {{--                                    <tbody>--}}
                    {{--                                    @foreach($cabinets as $key => $cabinet)--}}
                    {{--                                        <tr wire:key="position-row{{ $cabinet["id"] }}" wire:click="clickCabinet({{ $cabinet["id"] }})" class="choose-row @if($cabinet_id === $cabinet["id"]) bg-success text-white @endif">--}}
                    {{--                                            <td>{{ $cabinet["title"] }}</td>--}}
                    {{--                                            <td>{{ $cabinet["model"]  }}</td>--}}
                    {{--                                            <td>{{ $cabinet["distribution"]  }}</td>--}}
                    {{--                                        </tr>--}}
                    {{--                                    @endforeach--}}
                    {{--                                    </tbody>--}}
                    {{--                                </table>--}}
                    {{--                            </div>--}}

                    {{--                        </div>--}}
                    {{--                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">--}}
                    {{--                            <x-modal.buttons.cancel />--}}
                    {{--                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($cabinet_id)) disabled @endif>--}}
                    {{--                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}--}}
                    {{--                            </button>--}}
                    {{--                        </div>--}}
                    {{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

</div>
