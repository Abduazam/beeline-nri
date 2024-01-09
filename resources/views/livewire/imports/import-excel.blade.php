<div class="col-6 col-md-4 col-xl-2">
    <button type="button" class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" data-bs-toggle="modal" data-bs-target="#modal-import-excel">
        <div class="block-content">
            <p class="mt-1 mb-2">
                <i class="fa fa-file-excel fa-2x text-muted"></i>
            </p>
            <p class="fw-semibold">Загрузить Excel</p>
        </div>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-import-excel" tabindex="-1" role="dialog" aria-labelledby="modal-import-excel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="upload" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Загрузить Excel</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <input wire:model="file" type="file" class="form-control form-control-sm mb-4" accept=".xls,.xlsx">
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="upload" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($file)) disabled @endif>Загрузить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
