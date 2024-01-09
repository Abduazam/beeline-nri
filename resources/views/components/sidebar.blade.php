<!-- Sidebar -->
<nav class="bg-primary-dark h-100 overflow-y-auto">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main mb-5">
                @if(request()->is('user*'))
                    <x-sidebar.user-sidebar />
                @endif
                @if(request()->is('widget*'))
                    <x-sidebar.widget-sidebar />
                @endif
                @if(request()->is('area*'))
                    <x-sidebar.area-sidebar />
                @endif
                @if(request()->is('data*'))
                    <x-sidebar.data-sidebar />
                @endif
                @if(request()->is('workflow*'))
                    <x-sidebar.workflow-sidebar />
                @endif
                @if(request()->is('settings*'))
                    <x-sidebar.settings-sidebar />
                @endif
                @if(request()->is('positions*'))
                    <x-sidebar.positions-sidebar />
                @endif
                @if(request()->is('base-stations*'))
                    <x-sidebar.base-stations-sidebar />
                @endif
            </ul>
        </div>
    </div>
</nav>
