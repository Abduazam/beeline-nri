<?php

namespace App\Services\Data\Purpose\Restore;

use App\Models\Data\Purpose\Purpose;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Purpose $purpose): void
    {
        try {
            DB::beginTransaction();

            $purpose->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
