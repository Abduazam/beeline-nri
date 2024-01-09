@can('base-station section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('base-stations/base-station*')) active @endif" href="{{ route('base-stations.base-station.index') }}">
            <i class="nav-main-link-icon fa fa-file-signature pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('base-station') }}</span>
        </a>
    </li>
@endcan
