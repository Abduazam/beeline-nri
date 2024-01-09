<?php

namespace App\Services\Data\Place\PlaceTypes\Create;

use App\Models\Data\Place\PlaceType\PlaceType;
use App\Models\Data\Place\PlaceType\PlaceTypeTranslation;
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

            $type = new PlaceType();
            $type->save();

            foreach ($data as $key => $value) {
                PlaceTypeTranslation::create([
                    'place_type_id' => $type->id,
                    'locale' => $key,
                    'name' => $value
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
