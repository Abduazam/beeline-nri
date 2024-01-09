<?php

namespace App\Services\Data\Position\Company\Create;

use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\Company\CompanyTranslation;
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

            $purpose = new Company();
            $purpose->save();

            foreach ($data as $key => $value) {
                CompanyTranslation::create([
                    'company_id' => $purpose->id,
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
