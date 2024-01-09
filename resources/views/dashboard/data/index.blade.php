<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 p-0">
            <x-navigation.home />
            @can('place types section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.place-types.index') }}">
                        <div class="ribbon-box">{{ $place_types }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-house-signal fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('place-types') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('place type groups section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.place-type-groups.index') }}">
                        <div class="ribbon-box">{{ $place_type_groups }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-boxes-stacked fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('place-type-groups') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('purposes section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.purposes.index') }}">
                        <div class="ribbon-box">{{ $purposes }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-crosshairs fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('purposes') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('coordinate types section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.coordinate-types.index') }}">
                        <div class="ribbon-box">{{ $coordinate_types }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-location-crosshairs fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('coordinate-types') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('companies section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.companies.index') }}">
                        <div class="ribbon-box">{{ $companies }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-building fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('companies') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('application types section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.application-types.index') }}">
                        <div class="ribbon-box">{{ $application_types }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-file-code fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('application-types') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('statuses section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.statuses.index') }}">
                        <div class="ribbon-box">{{ $statuses }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-list-check fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('statuses') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('states section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.states.index') }}">
                        <div class="ribbon-box">{{ $states }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-list-check fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('states') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('controllers section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.controllers.index') }}">
                        <div class="ribbon-box">{{ $controllers }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="far fa-closed-captioning fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('controllers') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('technologies section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.technologies.index') }}">
                        <div class="ribbon-box">{{ $technologies }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-bolt fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('technologies') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('diapasons section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.diapasons.index') }}">
                        <div class="ribbon-box">{{ $diapasons }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-signal fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('diapasons') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('room-types section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.room-types.index') }}">
                        <div class="ribbon-box">{{ $room_types }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-door-open fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('room-types') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('hardware-rooms section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.hardware-rooms.index') }}">
                        <div class="ribbon-box">{{ $hardware_rooms }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-magnifying-glass-location fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('hardware-rooms') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('hardware-owners section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.hardware-owners.index') }}">
                        <div class="ribbon-box">{{ $hardware_owners }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-user-secret fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('hardware-owners') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('location-antennas section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.location-antennas.index') }}">
                        <div class="ribbon-box">{{ $location_antennas }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-location-pin fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('location-antennas') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('general-contractors section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.general-contractors.index') }}">
                        <div class="ribbon-box">{{ $general_contractors }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fab fa-delicious fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('general-contractors') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('k-as section')
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('data.k-as.index') }}">
                        <div class="ribbon-box">{{ $k_as }}</div>
                        <div class="block-content">
                            <p class="mt-1 mb-2">
                                <i class="fa fa-k fa-2x text-muted"></i>
                            </p>
                            <p class="fw-semibold">{{ \App\Models\Widget\TextName::getTextTranslation('k-as') }}</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
