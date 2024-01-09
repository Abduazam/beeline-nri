<div>
    <button class="btn bg-success text-white px-4 ms-2" data-bs-toggle="modal" data-bs-target="#accept-application-{{ $application->id }}">
        <small>{{ \App\Models\Widget\TextName::getTextTranslation('accept') }}</small>
    </button>

    <!-- Accept Position Application Modal -->
    <div wire:ignore.self class="modal fade" id="accept-application-{{ $application->id }}" tabindex="-1"
         role="dialog" aria-labelledby="accept-application-{{ $application->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <form wire:submit.prevent="accept" class="form-border-radius">
                        <x-modal.header action="accept" model="application" />
                        <div class="block-content fs-sm text-start">
                            <div class="mb-4">
                                <label class="form-label" for="comment">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_acceptors', 'comment') }} <x-texts.required-sign /></label>
                                <textarea wire:model="comment" type="text" class="form-control form-control-sm @error('comment') is-invalid @enderror" id="comment" name="comment" rows="4"></textarea>
                                @error('comment')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <x-modal.footer button="accept" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
