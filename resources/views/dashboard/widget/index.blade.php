<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0">
            <x-navigation.home />
            @can('languages section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('widget.languages.index') }}">
                        <div class="ribbon-box">{{ $languages }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-earth-americas fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('languages') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('table columns section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('widget.table-columns.index') }}">
                        <div class="ribbon-box">{{ $tables }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-database fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('table-columns') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('text names section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('widget.text-names.index') }}">
                        <div class="ribbon-box">{{ $texts }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-text-height fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('text-names') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
