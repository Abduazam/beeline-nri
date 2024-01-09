<div>
    @php
        $disabled = $errors->any() || \App\Helpers\Helper::anyKeyIsEmpty($this->data);
    @endphp

    <x-modal.opens.edit target="#modal-edit-state-{{ $this?->state?->id }}" />

    <!-- Edit State Modal -->
    <div wire:ignore.self class="modal fade" id="modal-edit-state-{{ $this?->state?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-state-{{ $this?->state?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="update" class="form-border-radius">
                        <x-modal.header action="edit" model="state" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="aim">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('statees', 'aim') }}</label>
                                <input type="text" class="form-control form-control-sm" id="aim" name="aim" value="{{ $this->state->aim }}" disabled readonly>
                            </div>
                            <div class="col-12">
                                <ul class="nav nav-tabs nav-tabs-alt fs-sm" wire:ignore role="tablist">
                                    @foreach($languages as $language)
                                        <li class="nav-item cursor-pointer" role="presentation">
                                            <a class="nav-link @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-edit-{{ $language->slug }}-tab-{{ $this->state?->id }}" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-edit-{{ $language->slug }}-{{ $this->state?->id }}" role="tab" aria-controls="btabs-alt-static-edit-{{ $language->slug }}-{{ $this->state?->id }}" aria-selected="true">{{ $language->title }} <x-texts.required-sign /></a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="block-content tab-content px-0 fs-sm">
                                    @foreach($languages as $language)
                                        <div wire:ignore.self class="tab-pane @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-edit-{{ $language->slug }}-{{ $this->state?->id }}" role="tabpanel" aria-labelledby="btabs-alt-static-edit-{{ $language->slug }}-tab-{{ $this->state?->id }}" tabindex="0">
                                            <label for="{{ $language->slug }}" class="form-label w-100 mb-4">
                                                <input wire:model="data.{{ $language->slug }}" id="{{ $language->slug }}" name="{{ $language->slug }}" type="text" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('enter-value') }}" class="form-control form-control-sm @error('data.' . $language->slug){{ 'is-invalid mb-1' }}@enderror">
                                                @error('data.' . $language->slug)
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="edit" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
