@can('position section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('positions/position*')) active @endif" href="{{ route('positions.position.index') }}">
            <i class="nav-main-link-icon fa fa-file-signature pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('positions') }}</span>
        </a>
    </li>
@endcan
