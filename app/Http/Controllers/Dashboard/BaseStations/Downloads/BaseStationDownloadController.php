<?php

namespace App\Http\Controllers\Dashboard\BaseStations\Downloads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\Dashboard\BaseStations\BaseStation\DownloadAwpExport;

class BaseStationDownloadController extends Controller
{
    public function downloadAwp(Request $request)
    {
        $baseStationApplicationId = $request->input('bs-application-id');

        $fileName = 'awp-id-proekta' . $baseStationApplicationId . '.xlsx';

        return (new DownloadAwpExport($baseStationApplicationId))->download($fileName);
    }
}
