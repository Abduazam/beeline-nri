<?php

namespace App\Services\Data\Position\Company\Update;

use App\Models\Data\Position\Company\Company;
use App\Models\Data\Position\Company\CompanyTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Company $company): void
    {
        try {
            DB::beginTransaction();

            $translations = CompanyTranslation::query()
                ->where('company_id', $company->id)
                ->whereIn('locale', array_keys($data))
                ->get()
                ->keyBy('locale');

            foreach ($data as $key => $value) {
                $translation = $translations[$key] ?? null;

                if ($translation && $translation->name !== $value) {
                    $translation->update(['name' => $value]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
