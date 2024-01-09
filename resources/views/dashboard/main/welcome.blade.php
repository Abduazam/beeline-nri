<x-app-layout>
    <div class="content">
        <!-- Icon Navigation -->
        <div class="row">
            @can('user section')
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('user.index') }}">
                    <div class="block-content">
                        <p class="mt-1 mb-2">
                            <i class="si si-user fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('user') }}</p>
                    </div>
                </a>
            </div>
            @endcan
            @can('widget section')
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('widget.index') }}">
                    <div class="block-content">
                        <p class="mt-1 mb-2">
                            <i class="si si-equalizer fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('widget') }}</p>
                    </div>
                </a>
            </div>
            @endcan
            @can('area section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('area.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-map-location-dot fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('area-section') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('data section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('data.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-circle-nodes fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('data') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('workflow section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('workflow.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-diagram-predecessor fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('workflow') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('positions section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('positions.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-p fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('positions') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('base-stations section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('base-stations.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-b fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('base-stations') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('imports.index') }}">
                    <div class="block-content">
                        <p class="mt-1 mb-2">
                            <i class="fa fa-file-import fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('imports') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
