<div>
    @if(!is_null($this->sectors_name))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-antenna-sectors{{ $key }}"><u>{{ $this->sectors_name }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal" data-bs-target="#modal-antenna-sectors{{ $key }}">
            <i class="fa fa-file-pen"></i>
        </button>
    @endif

        <div wire:ignore.self class="modal fade" id="modal-antenna-sectors{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal-antenna-sectors{{ $key }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-rounded shadow-none mb-0">
                        <form wire:submit.prevent="choose" class="form-border-radius">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Выбор секторов</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <div class="table-responsive text-nowrap mb-4">
                                    <table class="own-table w-100">
                                        <thead>
                                        <tr>
                                            <th>Называние</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sectors as $index => $sector)
                                            <tr wire:key="sector-row{{ $index }}">
                                                <td>{{ $sector["title"] }}</td>
                                                <td>
                                                    <label for="active">
                                                        <input type="checkbox" class="form-check-input" id="active" name="active" wire:click="chooseSector({{ $index }})">
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                                <x-modal.buttons.cancel />
                                <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(empty($this->chosen_sectors)) disabled @endif>
                                    {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
