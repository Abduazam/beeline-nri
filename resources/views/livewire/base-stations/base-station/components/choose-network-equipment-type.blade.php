<div>
    @if(!is_null($this->equipment_model))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-choose-equipment-type{{ $key }}"><u>{{ $this->equipment_model }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-equipment-type{{ $key }}">Выбрать ТС</button>
    @endif

    <div wire:ignore.self class="modal fade" id="modal-choose-equipment-type{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal-choose-equipment-type{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-start">Тип оборудования</h3>
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
                                        <th class="text-center">Код ресурса</th>
                                        <th class="text-center">Код производителя</th>
                                        <th class="text-center">Обозначение</th>
                                        <th class="text-center">Наименование</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($equipments as $equipment)
                                        <tr wire:key="equipment-row{{ $equipment->id }}" wire:click="clickEquipment({{ $equipment->id }})" class="choose-row @if($equipment_type_id === $equipment->id) bg-success text-white @endif">
                                            <td class="text-center">{{ $equipment->resource_code }}</td>
                                            <td class="text-center">{{ $equipment->manufacturer_code }}</td>
                                            <td class="text-center">{{ $equipment->designation }}</td>
                                            <td class="text-center">{{ $equipment->title }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($equipments instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $equipments->links() }}
                            @endif
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($equipment_type_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
