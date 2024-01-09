<div>
    @php
        $disabled = $errors->any() || !isset($this->location_antenna->title);
    @endphp

    <x-modal.opens.restore target="#modal-restore-location-antenna-{{ $this?->location_antenna?->id }}" />

    <!-- Restore Location Antenna Modal -->
    <div wire:ignore.self class="modal fade" id="modal-restore-location-antenna-{{ $this?->location_antenna?->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-restore-location-antenna-{{ $this?->location_antenna?->id }}" aria-hidden="true">
        <div class="modal-dialog" style="top: 20%;" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="restore" class="form-border-radius">
                        <x-modal.header action="restore" model="location-antenna" />
                        <div class="block-content fs-sm text-start">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 px-0 mb-4">
                                    <label class="form-label" for="title">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('location_antennas', 'title') }} <x-texts.required-sign /></label>
                                    <input wire:model="location_antenna.title" type="text" class="form-control form-control-sm @error('location_antenna.title'){{ 'is-invalid mb-1' }}@enderror" id="title" name="title" disabled>
                                    @error('location_antenna.title')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-modal.footer button="restore" :disabled="$disabled" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
