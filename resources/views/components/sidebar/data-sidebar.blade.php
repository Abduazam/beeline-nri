@can('place types section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/place-types*')) active @endif" href="{{ route('data.place-types.index') }}">
            <i class="nav-main-link-icon fa fa-house-signal pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('place-types') }}</span>
        </a>
    </li>
@endcan
@can('place type groups section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/place-type-groups*')) active @endif" href="{{ route('data.place-type-groups.index') }}">
            <i class="nav-main-link-icon fa fa-boxes-stacked pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('place-type-groups') }}</span>
        </a>
    </li>
@endcan
@can('purposes section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/purposes*')) active @endif" href="{{ route('data.purposes.index') }}">
            <i class="nav-main-link-icon fa fa-crosshairs pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('purposes') }}</span>
        </a>
    </li>
@endcan
@can('coordinate types section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/coordinate-types*')) active @endif" href="{{ route('data.coordinate-types.index') }}">
            <i class="nav-main-link-icon fa fa-location-crosshairs pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-types') }}</span>
        </a>
    </li>
@endcan
@can('companies section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/companies*')) active @endif" href="{{ route('data.companies.index') }}">
            <i class="nav-main-link-icon fa fa-building pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('companies') }}</span>
        </a>
    </li>
@endcan
@can('application types section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/application-types*')) active @endif" href="{{ route('data.application-types.index') }}">
            <i class="nav-main-link-icon fa fa-file-code pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('application-types') }}</span>
        </a>
    </li>
@endcan
@can('statuses section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/statuses*')) active @endif" href="{{ route('data.statuses.index') }}">
            <i class="nav-main-link-icon fa fa-list-check pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('statuses') }}</span>
        </a>
    </li>
@endcan
@can('states section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/states*')) active @endif" href="{{ route('data.states.index') }}">
            <i class="nav-main-link-icon fa fa-list-check pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('states') }}</span>
        </a>
    </li>
@endcan
@can('controllers section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/controllers*')) active @endif" href="{{ route('data.controllers.index') }}">
            <i class="nav-main-link-icon far fa-closed-captioning pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('controllers') }}</span>
        </a>
    </li>
@endcan
@can('technologies section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/technologies*')) active @endif" href="{{ route('data.technologies.index') }}">
            <i class="nav-main-link-icon fa fa-bolt pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('technologies') }}</span>
        </a>
    </li>
@endcan
@can('diapasons section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/diapasons*')) active @endif" href="{{ route('data.diapasons.index') }}">
            <i class="nav-main-link-icon fa fa-signal pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('diapasons') }}</span>
        </a>
    </li>
@endcan
@can('room-types section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/room-types*')) active @endif" href="{{ route('data.room-types.index') }}">
            <i class="nav-main-link-icon fa fa-door-open pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('room-types') }}</span>
        </a>
    </li>
@endcan
@can('hardware-rooms section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/hardware-rooms*')) active @endif" href="{{ route('data.hardware-rooms.index') }}">
            <i class="nav-main-link-icon fa fa-magnifying-glass-location pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('hardware-rooms') }}</span>
        </a>
    </li>
@endcan
@can('location-antennas section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/location-antennas*')) active @endif" href="{{ route('data.location-antennas.index') }}">
            <i class="nav-main-link-icon fa fa-location-pin pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('location-antennas') }}</span>
        </a>
    </li>
@endcan
@can('general-contractors section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/general-contractors*')) active @endif" href="{{ route('data.general-contractors.index') }}">
            <i class="nav-main-link-icon fab fa-delicious pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('general-contractors') }}</span>
        </a>
    </li>
@endcan
@can('k-as section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data/k-as*')) active @endif" href="{{ route('data.k-as.index') }}">
            <i class="nav-main-link-icon fa fa-k pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('k-as') }}</span>
        </a>
    </li>
@endcan
