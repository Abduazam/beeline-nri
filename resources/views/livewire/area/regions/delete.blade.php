<div class="ms-1">
    @php
        $disabled = $errors->any() || \App\Helpers\Helper::anyKeyIsEmpty($this->data) || !isset($this->branch_id);
    @endphp

    <x-modal.opens.delete target="#modal-delete-region-{{ $this?->region?->id }}" />

    <!-- Delete Region Modal -->
    <div wire:ignore.self class="modal fade" id="modal-delete-region-{{ $this?->region?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-region-{{ $this?->region?->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="delete" class="form-border-radius">
                        <x-modal.header action="delete" model="region" />
                        <div class="block-content fs-sm text-start">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="branch_id">{{ \App\Models\Widget\TextName::getTextTranslation('branch') }}</label>
                                <select wire:model="branch_id" class="form-select form-select-sm" id="branch_id" name="branch_id" style="width: 100%;" disabled>
                                    <option selected>{{ $region->branch->translations[0]->name }}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <ul class="nav nav-tabs nav-tabs-alt fs-sm" wire:ignore role="tablist">
                                    @foreach($languages as $language)
                                        <li class="nav-item cursor-pointer" role="presentation">
                                            <a class="nav-link @if($loop->index == 0) active @endif" id="btabs-alt-static-delete-{{ $language->slug }}-tab-{{ $this?->region?->id }}" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-delete-{{ $language->slug }}-{{ $this?->region?->id }}" role="tab" aria-controls="btabs-alt-static-delete-{{ $language->slug }}-{{ $this?->region?->id }}" aria-selected="true">{{ $language->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="block-content tab-content px-0 fs-sm">
                                    @foreach($languages as $language)
                                        <div wire:ignore.self class="tab-pane @if($loop->index == 0) active @endif" id="btabs-alt-static-delete-{{ $language->slug }}-{{ $this?->region?->id }}" role="tabpanel" aria-labelledby="btabs-alt-static-delete-{{ $language->slug }}-tab-{{ $this?->region?->id }}" tabindex="0">
                                            <label for="{{ $language->slug }}" class="form-label w-100 mb-4">
                                                <input wire:model="data.{{ $language->slug }}" id="{{ $language->slug }}" name="{{ $language->slug }}" type="text" placeholder="Enter name in {{ $language->title }}" class="form-control form-control-sm @error('data.' . $language->slug){{ 'is-invalid mb-1' }}@enderror" disabled>
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
