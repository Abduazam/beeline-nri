@can('languages section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('widget/languages*')) active @endif" href="{{ route('widget.languages.index') }}">
            <i class="nav-main-link-icon fa fa-earth-americas pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('languages') }}</span>
        </a>
    </li>
@endcan
@can('table columns section')
    <li class="nav-main-item">
        <a class="nav-main-link flex-nowrap @if(request()->is('widget/table-columns*')) active @endif overflow-hidden" href="{{ route('widget.table-columns.index') }}">
            <i class="nav-main-link-icon fa fa-database pe-3"></i>
            <span class="nav-main-link-name d-flex flex-nowrap">{{ \App\Models\Widget\TextName::getTextTranslation('table-columns') }}</span>
        </a>
    </li>
@endcan
@can('text names section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('widget/text-names*')) active @endif" href="{{ route('widget.text-names.index') }}">
            <i class="nav-main-link-icon fa fa-text-height pe-3"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('text-names') }}</span>
        </a>
    </li>
@endcan
