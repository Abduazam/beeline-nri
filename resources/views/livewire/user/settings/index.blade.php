<div class="content">
    @php
        $enter_value = \App\Models\Widget\TextName::getTextTranslation('enter-value');
    @endphp

    <form wire:submit.prevent="update">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-9 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('info') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'name') }}</label>
                                <input wire:model.debounce.500ms="user.name" type="text" class="form-control @error('user.name'){{ 'is-invalid mb-1' }}@enderror" id="name" name="name" placeholder="{{ $enter_value }}">
                                @error('user.name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-sm" for="email">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'email') }}</label>
                                <input wire:model.debounce.500ms="user.email" type="email"
                                       class="form-control @error('user.email'){{ 'is-invalid mb-1' }}@enderror"
                                       id="email" name="email" placeholder="{{ $enter_value }}">
                                @error('user.email')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label fs-sm" for="password">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'password') }}</label>
                                <input wire:model.debounce.500ms="password" type="password"
                                       class="form-control @error('password'){{ 'is-invalid mb-1' }}@enderror"
                                       id="password" name="password" placeholder="{{ $enter_value }}">
                                @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-sm" for="password_confirmation">{{ \App\Models\Widget\TextName::getTextTranslation('confirm-password') }}</label>
                                <input wire:model.debounce.500ms="password_confirmation" type="password"
                                       class="form-control @error('password_confirmation'){{ 'is-invalid mb-1' }}@enderror"
                                       id="password_confirmation" name="password_confirmation"
                                       placeholder="{{ $enter_value }}">
                                @error('password_confirmation')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <x-action.cancel route="{{ route('home') }}" />
                    <x-action.submit target="update" />
                </div>
            </div>
            <div class="col-md-3 pe-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'image') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div x-data="{ isUploading: false, progress: 0 }"
                                     x-on:livewire-upload-start="isUploading = true"
                                     x-on:livewire-upload-finish="isUploading = false, progress = 0"
                                     x-on:livewire-upload-error="isUploading = false"
                                     x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <label class="form-label" for="image">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'image') }}</label>
                                    <input wire:model="image"
                                           class="form-control @error('image'){{ 'is-invalid' }}@enderror" type="file"
                                           id="image" accept="image/jpg, image/jpeg, image/png, image/svg, image/heic">
                                    <div x-show.transition="isUploading" class="progress push mt-2"
                                         style="height: 15px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             role="progressbar" x-bind:style="`width: ${progress}%;`" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @error('image')
                                    <span class="text-danger pt-2 ps-1 small">{{ $message }}</span>
                                    @enderror
                                    @if(isset($user->image) and !$image)
                                        <div class="file-block text-center pt-3">
                                            {!! $user->getImage() !!}
                                        </div>
                                    @endif
                                    @if($image instanceof Illuminate\Http\UploadedFile)
                                        @php
                                            $extension = $image->guessExtension();
                                        @endphp

                                        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'heic']))
                                            <div class="w-100 text-center">
                                                <img src="{{ $image->temporaryUrl() }}" alt="" class="w-75 pt-3">
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
