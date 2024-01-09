<div class="ms-1">
    @php
        $disabled = $errors->any() || \App\Helpers\Helper::anyKeyIsEmpty($this->data);
    @endphp

    <x-modal.opens.delete target="#modal-delete-company-{{ $this?->company?->id }}" />

    <!-- Delete Company Modal -->
    <div wire:ignore.self class="modal fade" id="modal-delete-company-{{ $this?->company?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-company-{{ $this?->company?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="company" />
                        <div class="block-content fs-sm text-start">
                            <div class="col-12">
                                <ul class="nav nav-tabs nav-tabs-alt fs-sm" wire:ignore role="tablist">
                                    @foreach($languages as $language)
                                        <li class="nav-item cursor-pointer" role="presentation">
                                            <a class="nav-link @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-delete-{{ $language->slug }}-tab-{{ $this->company?->id }}" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-delete-{{ $language->slug }}-{{ $this->company?->id }}" role="tab" aria-controls="btabs-alt-static-delete-{{ $language->slug }}-{{ $this->company?->id }}" aria-selected="true">{{ $language->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="block-content tab-content px-0 fs-sm">
                                    @foreach($languages as $language)
                                        <div wire:ignore.self class="tab-pane @if($language->slug === App::getLocale()) active @endif" id="btabs-alt-static-delete-{{ $language->slug }}-{{ $this->company?->id }}" role="tabpanel" aria-labelledby="btabs-alt-static-delete-{{ $language->slug }}-tab-{{ $this->company?->id }}" tabindex="0">
                                            <label for="{{ $language->slug }}" class="form-label w-100 mb-4">
                                                <input wire:model="data.{{ $language->slug }}" id="{{ $language->slug }}" name="{{ $language->slug }}" type="text" class="form-control form-control-sm @error('data.' . $language->slug){{ 'is-invalid mb-1' }}@enderror" disabled>
                                                @error('data.' . $language->slug)
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="delete" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
