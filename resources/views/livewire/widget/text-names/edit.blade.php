<div class="content">
    <form wire:submit.prevent="update">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-12 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('info') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-12">
                                <label class="form-label fs-sm" for="key">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('text_names', 'key') }}</label>
                                <input wire:model="textKey" type="text" class="form-control" id="key" name="key" disabled>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-12" wire:ignore>
                                <ul class="nav nav-tabs nav-tabs-alt fs-sm" role="tablist">
                                    @foreach($languages as $language)
                                        <li class="nav-item cursor-pointer" role="presentation">
                                            <a class="nav-link @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-{{ $language->slug }}-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-{{ $language->slug }}" role="tab" aria-controls="btabs-alt-static-{{ $language->slug }}" aria-selected="true">{{ $language->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="block-content tab-content px-0 fs-sm" >
                                    @foreach($languages as $language)
                                        <div class="tab-pane @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-{{ $language->slug }}" role="tabpanel" aria-labelledby="btabs-alt-static-{{ $language->slug }}-tab" tabindex="0">
                                            <div class="table-block">
                                                <label class="w-100">
                                                    <input wire:model.defer="data.{{ $language->slug }}" class="form-control" type="text" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}">
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <x-action.cancel route="{{ route('widget.text-names.index') }}" />
                    <x-action.submit target="update" />
                </div>
            </div>
        </div>
    </form>
</div>
