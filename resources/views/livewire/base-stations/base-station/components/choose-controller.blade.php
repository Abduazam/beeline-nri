<div>
    @if(!is_null($controller_name))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-choose-controller{{ $diapason_id }}"><u>{{ $controller_name }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-controller{{ $diapason_id }}">Выбрать контроллер</button>
    @endif

    <div wire:ignore.self class="modal fade" id="modal-choose-controller{{ $diapason_id }}" tabindex="-1" role="dialog" aria-labelledby="modal-choose-controller{{ $diapason_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-start">{{ \App\Models\Widget\TextName::getTextTranslation('controllers') }}</h3>
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
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'name') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'gfk') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number_position') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'position') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'address') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'state_id') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($controllers as $controller)
                                        <tr wire:key="controller-row{{ $controller->id }}" wire:click="clickController({{ $controller->id }})" class="choose-row @if($controller_id === $controller->id) bg-success text-white @endif">
                                            <td class="text-center">{{ $controller->number }}</td>
                                            <td class="text-center">{{ $controller->name }}</td>
                                            <td class="text-center">{{ $controller->gfk }}</td>
                                            <td class="text-center">{{ $controller->number_position }}</td>
                                            <td class="text-center">{{ $controller->position }}</td>
                                            <td class="text-center">{{ $controller->address }}</td>
                                            <td class="text-center">{{ $controller->state->translations[0]->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($controllers instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $controllers->links() }}
                            @endif
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($controller_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
