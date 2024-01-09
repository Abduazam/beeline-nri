<?php

namespace App\Services\Data\Purpose\Delete;

use App\Models\Data\Purpose\Purpose;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(Purpose $purpose): void
    {
        try {
            DB::beginTransaction();

            $purpose->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
