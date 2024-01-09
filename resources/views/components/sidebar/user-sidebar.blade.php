@can('roles section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('user/roles*')) active @endif" href="{{ route('user.roles.index') }}">
            <i class="nav-main-link-icon fa fa-gear pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('roles') }}</span>
        </a>
    </li>
@endcan
@can('users section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('user/users*')) active @endif" href="{{ route('user.users.index') }}">
            <i class="nav-main-link-icon fa fa-user pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('users') }}</span>
        </a>
    </li>
@endcan
@can('permissions section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('user/permissions*')) active @endif" href="{{ route('user.permissions.index') }}">
            <i class="nav-main-link-icon fa fa-unlock-keyhole pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('permissions') }}</span>
        </a>
    </li>
@endcan
