<?php

namespace App\Services\Area\Regions\Create;

use App\Models\Area\Region\Region;
use App\Models\Area\Region\RegionTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $region = Region::create(['branch_id' => $data['branch_id']]);

            foreach ($data['data'] as $key => $value) {
                RegionTranslation::create([
                    'region_id' => $region->id,
                    'locale' => $key,
                    'name' => $value
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
