<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0">
            <x-navigation.home />
            @can('position section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('positions.position.index') }}">
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-file-signature fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('positions') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
