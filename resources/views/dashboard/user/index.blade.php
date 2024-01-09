<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0">
            <x-navigation.home />
            @can('roles section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('user.roles.index') }}">
                        <div class="ribbon-box">{{ $roles }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-gear fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('roles') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('users section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('user.users.index') }}">
                        <div class="ribbon-box">{{ $users }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-user fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('users') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('permissions section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('user.permissions.index') }}">
                        <div class="ribbon-box">{{ $permissions }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-unlock-keyhole fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('permissions') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
