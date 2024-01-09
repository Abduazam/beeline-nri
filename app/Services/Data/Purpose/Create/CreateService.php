<?php

namespace App\Services\Data\Purpose\Create;

use App\Models\Data\Purpose\Purpose;
use App\Models\Data\Purpose\PurposeTranslation;
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

            $purpose = new Purpose();
            $purpose->save();

            foreach ($data as $key => $value) {
                PurposeTranslation::create([
                    'purpose_id' => $purpose->id,
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
