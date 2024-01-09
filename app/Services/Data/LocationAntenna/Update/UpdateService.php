<?php

namespace App\Services\Data\LocationAntenna\Update;

use App\Models\Data\LocationAntenna\LocationAntenna;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, LocationAntenna $location_antenna): void
    {
        try {
            DB::beginTransaction();

            $location_antenna->update([
                'title' => $data['location_antenna']['title'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
