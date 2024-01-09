<?php

namespace App\Services\Data\GeneralContractor\Update;

use App\Models\Data\GeneralContractor\GeneralContractor;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(array $data, GeneralContractor $general_contractor): void
    {
        try {
            DB::beginTransaction();

            $general_contractor->update([
                'general_contractor_type_id' => $data['general_contractor']['general_contractor_type_id'],
                'inn' => $data['general_contractor']['inn'],
                'title' => $data['general_contractor']['title'],
                'address' => $data['general_contractor']['address'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
