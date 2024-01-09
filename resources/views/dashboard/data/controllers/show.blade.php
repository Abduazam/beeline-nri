<x-app-layout>
    <div class="content">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-12 p-0">
                <div class="block block-rounded">
                    <div class="block-header bg-elegance-dark py-2">
                        <h3 class="block-title fs-sm text-white text-center mt-1">{{ \App\Models\Widget\TextName::getTextTranslation('application-for') . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('add-new')) . ' ' . mb_strtolower(\App\Models\Widget\TextName::getTextTranslation('controller')) }}</h3>
                    </div>
                    <div class="block-content pb-2">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-lg-4 col-sm-6 col-12 ps-0 mb-3">
                                <label class="form-label fs-sm" for="region_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'region_id') }}</label>
                                <input type="text" class="form-control form-control-sm" id="region_id" name="region_id" value="{{ $controller->region->translations[0]->name }}" readonly>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 mb-3">
                                <label class="form-label fs-sm" for="number">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number') }}</label>
                                <input type="text" class="form-control form-control-sm" id="number" name="number" value="{{ $controller->number }}" readonly>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 pe-0 mb-3">
                                <label class="form-label fs-sm" for="state_id">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'state_id') }}</label>
                                <input type="text" class="form-control form-control-sm" id="state_id" name="state_id" value="{{ $controller->state->translations[0]->name }}" readonly>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12 ps-0 mb-3">
                                <label class="form-label fs-sm" for="name">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'name') }}</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $controller->name }}" readonly>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12 mb-3">
                                <label class="form-label fs-sm" for="gfk">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'gfk') }}</label>
                                <input type="text" class="form-control form-control-sm" id="gfk" name="gfk" value="{{ $controller->gfk }}" readonly>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12 pe-0 mb-3">
                                <label class="form-label fs-sm" for="address">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'address') }}</label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address" value="{{ $controller->address }}" readonly>
                            </div>
                            <div class="col-sm-6 col-12 ps-0 mb-3">
                                <label class="form-label fs-sm" for="position">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'position') }}</label>
                                <input type="text" class="form-control form-control-sm" id="position" name="position" value="{{ $controller->position }}" readonly>
                            </div>
                            <div class="col-sm-6 col-12 pe-0 mb-3">
                                <label class="form-label fs-sm" for="number_position">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('controllers', 'number_position') }}</label>
                                <input type="text" class="form-control form-control-sm" id="number_position" name="number_position" value="{{ $controller->number_position }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <x-action.back route="{{ route('data.controllers.index') }}" />
            </div>
        </div>
    </div>
</x-app-layout>
