<div class="content pb-4">
    <div class="row w-100 h-100 m-0 p-0">
        <div class="col-9 ps-0">
        @if($application->isCancelled() or ($application->isDeleting() and $application->isPreparing()) or ($application->isEditing() and $application->isPreparing()))
            @can('send position')
            <form wire:submit.prevent="send">
            @endcan
        @endif
            <div class="block block-rounded">
                <div class="block-header bg-elegance-dark py-2">
                    <h3 class="block-title fs-sm text-white text-center mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('position') }}</h3>
                </div>
                <div class="block-content">
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-lg-4 ps-0 mb-3">
                            <label class="form-label fs-sm" for="number">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->position->id }}" class="form-control form-control-sm" id="number" name="number" readonly disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label fs-sm" for="source">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'source') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->source : $application->position->source }}" class="form-control form-control-sm" id="source" name="source" readonly disabled>
                        </div>
                        <div class="col-lg-4 pe-0 mb-3">
                            <label class="form-label fs-sm" for="company_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'company_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->company->translations[0]->name : $application->position->company->translations[0]->name }}" class="form-control form-control-sm" id="company_id" name="company_id" readonly disabled>
                        </div>
                        <div class="col-lg-4 ps-0 mb-3">
                            <label class="form-label fs-sm" for="place_type_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'place_type_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->place_type->translations[0]->name : $application->position->place_type->translations[0]->name }}" class="form-control form-control-sm" id="place_type_id" name="place_type_id" readonly disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label fs-sm" for="place_type_group_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'place_type_group_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->place_type_group->translations[0]->name : $application->position->place_type_group->translations[0]->name }}" class="form-control form-control-sm" id="place_type_group_id" name="place_type_group_id" readonly disabled>
                        </div>
                        <div class="col-lg-4 pe-0 mb-3">
                            <label class="form-label fs-sm" for="purpose_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'purpose_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->purpose->translations[0]->name : $application->position->purpose->translations[0]->name }}" class="form-control form-control-sm" id="purpose_id" name="purpose_id" readonly disabled>
                        </div>
                        <div class="col-lg-4 ps-0 mb-3">
                            <label class="form-label fs-sm" for="region_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'region_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->region->translations[0]->name : $application->position->region->translations[0]->name }}" class="form-control form-control-sm" id="region_id" name="region_id" readonly disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label fs-sm" for="area_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'area_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->area?->translations[0]->name : $application->position->area?->translations[0]->name }}" class="form-control form-control-sm" id="area_id" name="area_id" readonly disabled>
                        </div>
                        <div class="col-lg-4 pe-0 mb-4">
                            <label class="form-label fs-sm" for="territory_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'territory_id') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->region->translations[0]->name : $application->position->region->translations[0]->name }}" class="form-control form-control-sm" id="territory_id" name="territory_id" readonly disabled>
                        </div>
                        <div class="col-lg-5 ps-0 mb-4">
                            <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'name') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->name : $application->position->name }}" class="form-control form-control-sm" id="name" name="name" readonly disabled>
                        </div>
                        <div class="col-lg-7 pe-0 mb-4">
                            <label class="form-label fs-sm" for="address">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'address') }} <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->address : $application->position->address }}" class="form-control form-control-sm" id="address" name="address" readonly disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-lg-4 ps-0 mb-4">
                            <label class="form-label fs-sm" for="coordinate_id">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-system') }}: <x-texts.required-sign /></label>
                            <input type="text" value="{{ $application->isEditing() ? $application->position->edits->coordinate->name : $application->position->coordinate->name }}" class="form-control form-control-sm" id="coordinate_id" name="coordinate_id" readonly disabled>
                        </div>
                        <div class="col-lg-8 mb-4">
                            <div class="row w-100 m-0 p-0">
                                <div class="col-6 d-flex align-items-center">
                                    <label for="latitude" class="col-form-label fs-sm col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'latitude') }}: <x-texts.required-sign /></label>
                                    <div class="col-8">
                                        <div class="col-12 mb-1">
                                            @php
                                                $data = explode(' ', (new \App\Helpers\Helper)->decimalToDegree($application->isEditing() ? $application->position->edits->latitude : $application->position->latitude));
                                            @endphp
                                            <div class="w-100 d-flex justify-content-between">
                                                <div class="col-3">
                                                    <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[0] }}" readonly disabled>
                                                </div>
                                                <div class="col-1">
                                                    <span class="ps-1 fs-lg">°</span>
                                                </div>
                                                <div class="col-3">
                                                    <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[1] }}" readonly disabled>
                                                </div>
                                                <div class="col-1">
                                                    <span class="ps-1 fs-lg">'</span>
                                                </div>
                                                <div class="col-4">
                                                    <input id="latitude" type="number" class="form-control form-control-sm" value="{{ $data[2] }}" readonly disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="w-100">
                                                <input type="number" class="form-control form-control-sm" value="{{ $application->isEditing() ? $application->position->edits->latitude : $application->position->latitude }}" readonly disabled>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <label for="longitude" class="col-form-label fs-sm col-4 mb-0">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'longitude') }}: <x-texts.required-sign /></label>
                                    <div class="col-8">
                                        <div class="col-12 mb-1">
                                            @php
                                                $data = explode(' ', (new \App\Helpers\Helper)->decimalToDegree($application->isEditing() ? $application->position->edits->longitude : $application->position->longitude));
                                            @endphp
                                            <div class="w-100 d-flex justify-content-between">
                                                <div class="col-3">
                                                    <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[0] }}" readonly disabled>
                                                </div>
                                                <div class="col-1">
                                                    <span class="ps-1 fs-lg">°</span>
                                                </div>
                                                <div class="col-3">
                                                    <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[1] }}" readonly disabled>
                                                </div>
                                                <div class="col-1">
                                                    <span class="ps-1 fs-lg">'</span>
                                                </div>
                                                <div class="col-4">
                                                    <input id="longitude" type="number" class="form-control form-control-sm" value="{{ $data[2] }}" readonly disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="w-100">
                                                <input type="number" class="form-control form-control-sm" value="{{ $application->isEditing() ? $application->position->edits->longitude : $application->position->longitude }}" readonly disabled>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-6 ps-0 mb-4">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-3 d-flex align-items-center ps-0">
                                    <label class="form-label fs-sm mb-0" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('positions', 'state_id') }}</label>
                                </div>
                                <input type="text" value="{{ $application->isEditing() ? $application->position->edits->state->translations[0]->name : $application->position->state->translations[0]->name }}" class="form-control form-control-sm w-auto" id="name" name="name" readonly disabled>
                            </div>
                        </div>
                        <div class="col-6 pe-0 mb-4">
                            <div class="row w-100 h-100 p-0 m-0 justify-content-end">
                                <div class="col-5 d-flex align-items-center px-0">
                                    <label class="form-label fs-sm mb-0" for="address">{{ \App\Models\Widget\TextName::getTextTranslation('position-closing') }}</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" value="" class="form-control form-control-sm" id="address" name="address" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 mb-4">
                            <label for="comment" class="form-label fs-sm">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_applications', 'comment') }}:</label>
                            <textarea class="form-control form-control-sm" id="comment" name="comment" rows="4" readonly disabled>{{ $application->comment }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @if($application->isResponded() and !$application->isCancelled())
                    <x-action.cancel route="{{ route('positions.position.index') }}" />
                    @can('cancel position')
                        <livewire:positions.position.acceptor.response.cancel :application="$application" :wire:key="'cancel-position-' . $application->id" />
                    @endcan
                    @can('accept position')
                        <livewire:positions.position.acceptor.response.accept :application="$application" :wire:key="'accept-position-' . $application->id" />
                    @endcan
                @else
                    <x-action.back route="{{ route('positions.position.index') }}" />
                    @if($application->isCancelled())
                        @can('create position')
                        <a href="{{ route('positions.acceptor.edit', $application) }}" class="btn bg-success text-white border-0 px-4 ms-2">
                            <small>{{ \App\Models\Widget\TextName::getTextTranslation('edit') }}</small>
                        </a>
                        @endcan
                        @can('send position')
                            <x-action.send target="send" />
                        @endcan
                    @endif
                @endif

                @if($application->isDeleting() and $application->isPreparing())
                    @can('delete position')
                        <a href="{{ route('positions.position.delete', $application->position) }}" class="btn bg-success text-white border-0 px-4 ms-2">
                            <small>{{ \App\Models\Widget\TextName::getTextTranslation('edit') }}</small>
                        </a>
                    @endcan
                    @can('send position')
                        <x-action.send target="send" />
                    @endcan
                @endif

                @if($application->isEditing() and $application->isPreparing())
                    @can('edit position')
                        <a href="{{ route('positions.position.edit', $application->position) }}" class="btn bg-success text-white border-0 px-4 ms-2">
                            <small>{{ \App\Models\Widget\TextName::getTextTranslation('edit') }}</small>
                        </a>
                    @endcan
                    @can('send position')
                        <x-action.send target="send" />
                    @endcan
                @endif
            </div>
        @if($application->isCancelled() or ($application->isDeleting() and $application->isPreparing()) or ($application->isEditing() and $application->isPreparing()))
            @can('send position')
                </form>
            @endcan
        @endif
        </div>
        <div class="col-3 pe-0">
            <div class="block block-rounded">
                <div class="block-header bg-elegance-dark py-2">
                    <h3 class="block-title fs-sm text-white text-center mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('workflow') . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('position')) }}</h3>
                </div>
                <div class="block-content fs-sm">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        @if(count($application->acceptors) > 0)
                            @foreach($application->acceptors as $acceptor)
                                <div class="block block-bordered block-rounded @if(!$loop->last) mb-2 @endif">
                                    <div class="block-header" role="tab" id="workflow-h{{ $loop->index }}">
                                        <a class="fw-semibold collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#workflow-q{{ $loop->index }}" aria-expanded="false" aria-controls="workflow-q{{ $loop->index }}">{{ $acceptor->workflow->title }}</a>
                                    </div>
                                    <div id="workflow-q{{ $loop->index }}" class="collapse" role="tabpanel" aria-labelledby="workflow-h{{ $loop->index }}" data-bs-parent="#accordion" style="">
                                        <div class="block-content pt-2 pb-4">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <span><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'active') }}</b>: {!! $acceptor->getActive() !!}</span>
                                                </li>
                                                <li class="nav-item">
                                                    <span><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'user_id') }}</b>: {{ $acceptor->user?->name }}</span>
                                                </li>
                                                <li class="nav-item">
                                                    <span><b>{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'comment') }}</b>: {!! $acceptor->comment !!}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
