<?php

namespace App\Services\Widget\Languages\Restore;

use Exception;
use App\Models\Widget\Language;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Language $language): void
    {
        try {
            DB::beginTransaction();

            $language->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
