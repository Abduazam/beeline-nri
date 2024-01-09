<?php

namespace App\Services\Area\Areas\Create;

use Exception;
use App\Models\Area\Area\Area;
use App\Models\Area\Region\Region;
use Illuminate\Support\Facades\DB;
use App\Models\Area\Area\AreaTranslation;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $region = Region::query()->where('id', $data['region_id'])->where('branch_id', $data['branch_id'])->first();
            if ($region) {
                $area = Area::create(['region_id' => $region->id]);

                foreach ($data['data'] as $key => $value) {
                    AreaTranslation::create([
                        'area_id' => $area->id,
                        'locale' => $key,
                        'name' => $value
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
