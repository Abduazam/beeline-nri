<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0">
            <x-navigation.home />
            @can('branches section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('area.branches.index') }}">
                        <div class="ribbon-box">{{ $branches }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-map-location-dot fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('branches') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('regions section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('area.regions.index') }}">
                        <div class="ribbon-box">{{ $regions }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-location-dot fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('regions') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('areas section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('area.areas.index') }}">
                        <div class="ribbon-box">{{ $areas }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-map-pin fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('areas') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
