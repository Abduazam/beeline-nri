<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0">
            <x-navigation.home />
            @can('position workflow section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('workflow.position-workflows.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-p fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('position-workflows') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('base-station workflow section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('workflow.base-station-workflows.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-b fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('base-station-workflows') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
