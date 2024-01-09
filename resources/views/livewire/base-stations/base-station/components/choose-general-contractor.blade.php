<div class="w-auto">
    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-general-contractor">
        <i class="fa fa-table"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-choose-general-contractor" tabindex="-1" role="dialog" aria-labelledby="modal-choose-general-contractor" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="choose" class="form-border-radius">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ \App\Models\Widget\TextName::getTextTranslation('general-contractors') }}</h3>
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
                                    <div class="col-3 pe-0">
                                        <label>
                                            <select wire:model="type_id" class="form-select form-select-sm" name="type_id" id="type_id">
                                                <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                                @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive text-nowrap mb-4">
                                <table class="own-table w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'id') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'inn') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'title') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'address') }}</th>
                                            <th class="text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('general_contractors', 'created_at') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($general_contractors as $general_contractor)
                                            <tr wire:key="general-contractor-row{{ $general_contractor->id }}" wire:click="clickGeneralContractor({{ $general_contractor->id }})" class="choose-row @if($general_contractor_id === $general_contractor->id) bg-success text-white @endif">
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $general_contractor->inn }}</td>
                                                <td class="text-center">{{ $general_contractor->title }}</td>
                                                <td class="text-center">{{ $general_contractor->address }}</td>
                                                <td class="text-center">{{ $general_contractor->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($general_contractors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $general_contractors->links() }}
                            @endif
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
                            <x-modal.buttons.cancel />
                            <button wire:target="choose" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-alt-success" data-bs-dismiss="modal" @if(is_null($general_contractor_id)) disabled @endif>
                                {{ \App\Models\Widget\TextName::getTextTranslation('choose') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
