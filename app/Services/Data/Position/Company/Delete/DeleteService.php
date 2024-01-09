<?php

namespace App\Services\Data\Position\Company\Delete;

use App\Models\Data\Position\Company\Company;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(Company $company): void
    {
        try {
            DB::beginTransaction();

            $company->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
