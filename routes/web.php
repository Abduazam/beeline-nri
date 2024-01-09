<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/**
 * Dashboard routes.
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
    Route::get('lang/{lang}', [\App\Http\Controllers\Home\HomeController::class, 'lang'])->name('lang');

    Route::prefix('imports')->name('imports.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Imports\ImportController::class, 'index'])->name('index');
    });

    Route::prefix('user')->name('user.')->middleware('can:user section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\User\UserController::class, 'index'])->name('index');

        Route::resource('users', \App\Http\Controllers\Dashboard\User\Users\UsersController::class);
        Route::resource('roles', \App\Http\Controllers\Dashboard\User\Roles\RolesController::class)->except(['store', 'update', 'destroy']);

        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\User\Permissions\PermissionsController::class, 'index'])->name('index');
        });
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\User\Settings\SettingsController::class, 'index'])->name('index');
    });

    Route::prefix('widget')->name('widget.')->middleware('can:widget section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Widget\WidgetController::class, 'index'])->name('index');

        Route::resource('table-columns', \App\Http\Controllers\Dashboard\Widget\TableColumns\TableColumnNameController::class)->except(['store', 'update', 'destroy']);;
        Route::resource('text-names', \App\Http\Controllers\Dashboard\Widget\TextNames\TextNameController::class)->except(['store', 'update', 'destroy']);

        Route::prefix('languages')->name('languages.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Widget\Languages\LanguageController::class, 'index'])->name('index');
        });
    });

    Route::prefix('area')->name('area.')->middleware('can:area section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Area\AreaController::class, 'index'])->name('index');

        Route::prefix('branches')->name('branches.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Area\Branches\BranchController::class, 'index'])->name('index');
        });

        Route::prefix('regions')->name('regions.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Area\Regions\RegionController::class, 'index'])->name('index');
        });

        Route::prefix('areas')->name('areas.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Area\Areas\AreaController::class, 'index'])->name('index');
        });
    });

    Route::prefix('data')->name('data.')->middleware('can:data section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Data\DataController::class, 'index'])->name('index');

        Route::prefix('place-types')->name('place-types.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Place\PlaceTypeController::class, 'index'])->name('index');
        });

        Route::prefix('place-type-groups')->name('place-type-groups.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Place\PlaceTypeGroupController::class, 'index'])->name('index');
        });

        Route::prefix('purposes')->name('purposes.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Purpose\PurposeController::class, 'index'])->name('index');
        });

        Route::prefix('coordinate-types')->name('coordinate-types.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\CoordinateType\CoordinateTypeController::class, 'index'])->name('index');
        });

        Route::prefix('companies')->name('companies.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Position\CompanyController::class, 'index'])->name('index');
        });

        Route::prefix('application-types')->name('application-types.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\ApplicationType\ApplicationTypeController::class, 'index'])->name('index');
        });

        Route::prefix('statuses')->name('statuses.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Position\StatusController::class, 'index'])->name('index');
        });

        Route::prefix('states')->name('states.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Position\StateController::class, 'index'])->name('index');
        });

        Route::resource('controllers', \App\Http\Controllers\Dashboard\Data\Controllers\ControllersController::class);

        Route::prefix('technologies')->name('technologies.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Technologies\TechnologyController::class, 'index'])->name('index');
        });

        Route::prefix('diapasons')->name('diapasons.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\Diapasons\DiapasonController::class, 'index'])->name('index');
        });

        Route::prefix('room-types')->name('room-types.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\RoomTypes\RoomTypeController::class, 'index'])->name('index');
        });

        Route::prefix('hardware-rooms')->name('hardware-rooms.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\HardwareRoom\HardwareRoomController::class, 'index'])->name('index');
        });

        Route::prefix('hardware-owners')->name('hardware-owners.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\HardwareOwner\HardwareOwnerController::class, 'index'])->name('index');
        });

        Route::prefix('location-antennas')->name('location-antennas.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\LocationAntenna\LocationAntennaController::class, 'index'])->name('index');
        });

        Route::prefix('general-contractors')->name('general-contractors.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\GeneralContractor\GeneralContractorController::class, 'index'])->name('index');
        });

        Route::prefix('k-as')->name('k-as.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Data\KA\KAContractorController::class, 'index'])->name('index');
        });
    });

    Route::prefix('workflow')->name('workflow.')->middleware('can:workflow section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Workflow\WorkflowController::class, 'index'])->name('index');

        Route::prefix('position-workflows')->name('position-workflows.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Workflow\Position\PositionWorkflowController::class, 'index'])->name('index');
        });

        Route::prefix('base-station-workflows')->name('base-station-workflows.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Workflow\BaseStation\BaseStationWorkflowController::class, 'index'])->name('index');
        });
    });

    Route::prefix('positions')->name('positions.')->middleware('can:positions section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\Positions\PositionController::class, 'index'])->name('index');

        Route::prefix('position')->name('position.')->group(function () {
            Route::get('{position}/delete', [\App\Http\Controllers\Dashboard\Positions\Position\PositionController::class, 'delete'])->name('delete');
        });

        Route::resource('position', \App\Http\Controllers\Dashboard\Positions\Position\PositionController::class);
        Route::resource('acceptor', \App\Http\Controllers\Dashboard\Positions\Position\PositionAcceptorController::class);
    });

    Route::prefix('base-stations')->name('base-stations.')->middleware('can:base-stations section')->group(function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\BaseStations\BaseStationController::class, 'index'])->name('index');

        Route::post('download/awp', [\App\Http\Controllers\Dashboard\BaseStations\Downloads\BaseStationDownloadController::class, 'downloadAwp'])->name('download-awp');

        Route::resource('base-station', \App\Http\Controllers\Dashboard\BaseStations\BaseStation\BaseStationController::class);
    });
});

/**
 * Auth routes.
 */
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);
