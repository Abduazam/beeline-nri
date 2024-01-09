<?php

namespace App\Exports\Dashboard\BaseStations\BaseStation;

use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\BaseStations\BaseStationApplications\BaseStationApplication;

class DownloadAwpExport implements FromView
{
    use Exportable;

    public function __construct(protected int $baseStationApplicationId) { }

    public function view(): View
    {
        $baseStationApplication = BaseStationApplication::findOrFail($this->baseStationApplicationId);

        return view('downloads.exports.base-stations.awp', compact('baseStationApplication'));
    }
}
