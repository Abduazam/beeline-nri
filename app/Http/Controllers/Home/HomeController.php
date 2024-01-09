<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Controllers\Controller as ControllerModel;
use App\Models\Type\ApplicationStatus\ApplicationStatus;
use App\Models\Type\BaseStationApplicationType\BaseStationApplicationType;
use App\Models\Type\CoordinateType\CoordinateType;
use App\Models\Type\Groups\PlacedType\PlacedTypeGroup;
use App\Models\Type\PlacedType\PlacedType;
use App\Models\Type\StreetType\StreetType;
use App\Models\Type\Technologies\Diapasons\Diapason;
use App\Models\Type\Technologies\Technology\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.main.welcome');
    }

    /**
     * Show the workflow section dashboard.
     *
     * @return View
     */
    public function workflow(): View
    {
        return view('dashboard.main.workflow');
    }

    /**
     * Change language dashboard.
     */
    public function lang($lang): RedirectResponse
    {
        App::setLocale($lang);
        Session::put('locale', $lang);
        return redirect()->back();
    }
}
