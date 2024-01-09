<div>
    @php
        $disabled = $errors->any() || \App\Helpers\Helper::anyKeyIsEmpty($this->data) || !isset($this->branch_id) || !isset($this->region_id);
    @endphp

    <x-modal.opens.create target="#modal-create-region" />

    <!-- Create Area Modal -->
    <div wire:ignore.self class="modal fade" id="modal-create-region" tabindex="-1" role="dialog"
         aria-labelledby="modal-create-branch" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="store" class="form-border-radius">
                        <x-modal.header action="create" model="area" />
                        <div class="block-content fs-sm text-start">
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <label class="form-label" for="branch_id">{{ \App\Models\Widget\TextName::getTextTranslation('branch') }} <x-texts.required-sign /></label>
                                    <select wire:model="branch_id" class="form-select form-select-sm" id="branch_id" name="branch_id" style="width: 100%;" data-placeholder="Choose branch">
                                        <option value="null" disabled readonly>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->translations[0]->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-4">
                                    <label class="form-label" for="region_id">{{ \App\Models\Widget\TextName::getTextTranslation('region') }} <x-texts.required-sign /></label>
                                    <select wire:model="region_id" class="form-select form-select-sm" id="region_id" name="region_id" style="width: 100%;" data-placeholder="Choose region" @if(empty($this->regions)) disabled @endif>
                                        <option value="null" disabled readonly>{{ \App\Models\Widget\TextName::getTextTranslation('choose-value') }}</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->translations[0]->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="nav nav-tabs nav-tabs-alt fs-sm" wire:ignore role="tablist">
                                    @foreach($languages as $language)
                                        <li class="nav-item cursor-pointer" role="presentation">
                                            <a class="nav-link @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-{{ $language->slug }}-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-{{ $language->slug }}" role="tab" aria-controls="btabs-alt-static-{{ $language->slug }}" aria-selected="true">{{ $language->title }} <x-texts.required-sign /></a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="block-content tab-content px-0 fs-sm">
                                    @foreach($languages as $language)
                                        <div wire:ignore.self class="tab-pane @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-{{ $language->slug }}" role="tabpanel" aria-labelledby="btabs-alt-static-{{ $language->slug }}-tab" tabindex="0">
                                            <label for="{{ $language->slug }}" class="form-label w-100 mb-4">
                                                <input wire:model="data.{{ $language->slug }}" id="{{ $language->slug }}" name="{{ $language->slug }}" type="text" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}" class="form-control form-control-sm  @error('data.' . $language->slug){{ 'is-invalid mb-1' }}@enderror">
                                                @error('data.' . $language->slug)
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="create" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
