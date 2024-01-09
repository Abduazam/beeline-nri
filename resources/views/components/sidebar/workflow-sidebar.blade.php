@can('position workflow section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('workflow/position-workflows*')) active @endif" href="{{ route('workflow.position-workflows.index') }}">
            <i class="nav-main-link-icon fa fa-p pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('position-workflows') }}</span>
        </a>
    </li>
@endcan
@can('base-station workflow section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('workflow/base-station-workflows*')) active @endif" href="{{ route('workflow.base-station-workflows.index') }}">
            <i class="nav-main-link-icon fa fa-b pe-3 ms-1"></i>
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('base-station-workflows') }}</span>
        </a>
    </li>
@endcan
