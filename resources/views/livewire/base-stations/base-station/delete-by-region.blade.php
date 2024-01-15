<div>
    <button type="button" class="btn btn-sm bg-pulse text-white" data-bs-toggle="modal" data-bs-target="#modal-delete-bs-by-region">Удаление</button>


    <div wire:ignore.self class="modal fade" id="modal-delete-bs-by-region" tabindex="-1" role="dialog" aria-labelledby="modal-delete-bs-by-region" aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Удаление базовых станций по регионам</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm text-start">
                            <label class="w-100">
                                <select wire:model="region_id" class="form-select form-select-sm w-100 mb-4">
                                    <option value="null" disabled>Выберите, пожалуйста</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->translations?->first()->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="delete" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-danger" data-bs-dismiss="modal" @if(is_null($region_id)) disabled @endif>Удалить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
