<div>
    @if(!is_null($this->mu_type_model))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-modules-mu{{ $key }}"><u>{{ $this->mu_type_model }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal" data-bs-target="#modal-modules-mu{{ $key }}">
            <i class="fa fa-file-pen"></i>
        </button>
    @endif

    <div wire:ignore.self class="modal fade" id="modal-modules-mu{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal-modules-mu{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ \App\Models\Widget\TextName::getTextTranslation('positions') }}</h3>
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
                                        <th>Называние</th>
                                        <th>Модель</th>
                                        <th>Производитель</th>
                                        <th>Диапазон</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modules as $key => $module)
                                        <tr wire:key="position-row{{ $module->id }}" wire:click="clickModule({{ $module->id }})" class="choose-row @if($module_id === $module->id) bg-success text-white @endif">
                                            <td>{{ $module->title }}</td>
                                            <td>{{ $module->model  }}</td>
                                            <td>{{ $module->monufacturer  }}</td>
                                            <td>{{ $module->diapasons  }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($module_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
