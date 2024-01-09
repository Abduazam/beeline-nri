@can('user section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('user*')) active @endif" href="{{ route('user.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('user') }}</span>
        </a>
    </li>
@endcan
@can('widget section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('widget*')) active @endif" href="{{ route('widget.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('widget') }}</span>
        </a>
    </li>
@endcan
@can('area section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('area*')) active @endif" href="{{ route('area.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('area-section') }}</span>
        </a>
    </li>
@endcan
@can('data section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('data*')) active @endif" href="{{ route('data.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('data') }}</span>
        </a>
    </li>
@endcan
@can('workflow section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('workflow*')) active @endif" href="{{ route('workflow.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('workflow') }}</span>
        </a>
    </li>
@endcan
@can('positions section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('positions*')) active @endif" href="{{ route('positions.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('positions') }}</span>
        </a>
    </li>
@endcan
@can('base-stations section')
    <li class="nav-main-item">
        <a class="nav-main-link @if(request()->is('base-stations*')) active @endif" href="{{ route('base-stations.index') }}">
            <span class="nav-main-link-name">{{ \App\Models\Widget\TextName::getTextTranslation('base-stations') }}</span>
        </a>
    </li>
@endcan
