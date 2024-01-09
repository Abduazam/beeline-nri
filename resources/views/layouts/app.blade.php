<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Beeline - NRI</title>
    <meta name="description"
          content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <link rel="shortcut icon" href="/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- Trix Editor CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"/>
    <!-- Codebase CSS framework -->
    <link rel="stylesheet" id="css-main" href="/assets/css/codebase.min.css">
    <link rel="stylesheet" id="css-theme" href="/assets/css/themes/corporate.min.css">
    <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body>

<div id="page-container"
     class="sidebar-dark side-scroll page-header-fixed page-header-glass page-header-dark main-content-boxed">
    @if(!request()->is('login'))
        <!-- Sidebar -->
        <nav id="sidebar" style="z-index: 9999;">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center bg-black-10">
                    <x-logo/>

                    <!-- Options -->
                    <div>
                        <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                                data-action="sidebar_close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <x-navbar/>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header id="page-header" class="bg-primary-dark">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center space-x-3">
                    <x-logo/>

                    <!-- Header Navigation -->
                    <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block">
                        <x-navbar/>
                    </ul>
                </div>

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block fw-semibold">{{ auth()?->user()?->name }}</span>
                            <i class="fa fa-angle-down opacity-50 ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                             aria-labelledby="page-header-user-dropdown">
                            <div class="px-2 py-3 bg-body-light rounded-top">
                                <h5 class="h6 text-center mb-0">
                                    {{ auth()?->user()?->name }}
                                </h5>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                   href="{{ route('settings.index') }}" data-toggle="layout"
                                   data-action="side_overlay_toggle">
                                    <span>{{ \App\Models\Widget\TextName::getTextTranslation('settings') }}</span>
                                    <i class="fa fa-fw fa-wrench opacity-25"></i>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span>{{ \App\Models\Widget\TextName::getTextTranslation('sign-out') }}</span>
                                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Language -->
                    <x-language/>

                    <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                            data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>
    @endif

    @include('layouts.toasts')

    <!-- Main Container -->
    <main id="main-container">
        <div @if(!request()->is('login')) style="padding-top: 68px;" @endif>
            <div class="row w-100 h-100 p-0 m-0">
                @if(!request()->is('/') and !request()->is('login'))
                    <div id="inner-sidebar" class="h-100 p-0">
                        <x-sidebar/>
                    </div>

                    <div class="col-12 ps-6">
                        <x-breadcrumb/>

                        {{ $slot }}
                    </div>
                @else
                    {{ $slot }}
                @endif
            </div>
        </div>
    </main>

    @if(!request()->is('login'))
        <!-- Footer -->
        <footer id="page-footer" @if(!request()->is('/') and !request()->is('login')) class="ps-6" @endif>
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/95j" target="_blank">Codebase 5.5</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
    @endif
</div>

<!-- Codebase JS Framework -->
<script src="/assets/js/codebase.app.min.js"></script>
<!-- Page JS Plugins -->
<script src="/assets/js/plugins/chart.js/chart.umd.js"></script>
<script src="/assets/js/pages/db_corporate.min.js"></script>
<script src="/assets/js/lib/jquery.min.js"></script>
<script src="/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
<!-- Alpine JS Framework -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- Trix Editor JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<!-- Livewire JS -->
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
<!-- Events -->
<script src="/assets/js/script.js"></script>
<!-- Custom JS -->
@stack('scripts')
</body>
</html>
