<?php

namespace App\Services\Area\Branches\Create;

use Exception;
use App\Models\Area\Branch\Branch;
use Illuminate\Support\Facades\DB;
use App\Models\Area\Branch\BranchTranslation;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $branch = new Branch();
            $branch->save();

            foreach ($data as $key => $value) {
                BranchTranslation::create([
                    'branch_id' => $branch->id,
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
