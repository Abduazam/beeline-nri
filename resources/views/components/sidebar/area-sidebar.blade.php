@can('branches section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('area/branches*')) active @endif" href="{{ route('area.branches.index') }}">
            <i class="nav-main-link-icon fa fa-map-location-dot pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('branches') }}</span>
        </a>
    </li>
@endcan
@can('regions section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('area/regions*')) active @endif" href="{{ route('area.regions.index') }}">
            <i class="nav-main-link-icon fa fa-location-dot ms-1 pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('regions') }}</span>
        </a>
    </li>
@endcan
@can('areas section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('area/areas*')) active @endif" href="{{ route('area.areas.index') }}">
            <i class="nav-main-link-icon fa fa-map-pin ms-1 pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('areas') }}</span>
        </a>
    </li>
@endcan
