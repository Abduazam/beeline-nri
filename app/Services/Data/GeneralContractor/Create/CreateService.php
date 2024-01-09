<?php

namespace App\Services\Data\GeneralContractor\Create;

use App\Models\Data\GeneralContractor\GeneralContractor;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateService
{
    /**
     * @throws Throwable
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            GeneralContractor::create([
                'general_contractor_type_id' => $data['type_id'],
                'inn' => $data['inn'],
                'title' => $data['title'],
                'address' => $data['address'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
