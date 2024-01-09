<?php

namespace App\Services\Data\Position\Company\Restore;

use App\Models\Data\Position\Company\Company;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Company $company): void
    {
        try {
            DB::beginTransaction();

            $company->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
