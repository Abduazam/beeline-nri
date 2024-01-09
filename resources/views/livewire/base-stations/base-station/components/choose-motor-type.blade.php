<div>
    @if(!is_null($this->motor_model))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-choose-motor{{ $key }}"><u>{{ $this->motor_model }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-motor{{ $key }}">Выбрать мотор</button>
    @endif

    <div wire:ignore.self class="modal fade" id="modal-choose-motor{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal-choose-motor{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-start">Моторы</h3>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motors as $motor)
                                        <tr wire:key="motor-row{{ $motor->id }}" wire:click="clickMotor({{ $motor->id }})" class="choose-row @if($motor_id === $motor->id) bg-success text-white @endif">
                                            <td class="text-center">{{ $motor->title }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($motors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $motors->links() }}
                            @endif
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($motor_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
