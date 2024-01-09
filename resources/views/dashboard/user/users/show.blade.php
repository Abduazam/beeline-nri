<x-app-layout>
    <div class="content">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-sm" for="email">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label fs-sm" for="role_id">{{ \App\Models\Widget\TextName::getTextTranslation('role') }}</label>
                                <select class="form-select" id="role_id" name="role_id" disabled>
                                    <option selected disabled readonly>{{ $user->roles()->first()->name }}</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-sm" for="user_branches">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('user_branches', 'branch_id') }}</label>
                                <select class="js-select2 form-select" id="user_branches" name="user_branches" multiple disabled>
                                    @foreach($user->branches as $branch)
                                        <option value="{{ $branch->id }}" selected>{{ $branch->translations[0]->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label fs-sm" for="password">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-sm" for="password_confirmation">{{ \App\Models\Widget\TextName::getTextTranslation('confirm-password') }}</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <x-action.back route="{{ route('user.users.index') }}" />
            </div>
            <div class="col-md-3 pe-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark">
                        <h3 class="block-title fs-sm text-white mt-1">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('users', 'image') }}</h3>
                    </div>
                    <div class="block-content">
                        <div class="row mb-4">
                            <div class="col-12">
                                @if(isset($user->image))
                                    <div class="file-block text-center">
                                        {!! $user->getImage() !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#user_branches').select2();
            });
        </script>
    @endpush
</x-app-layout>
