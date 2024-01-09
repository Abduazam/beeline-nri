<?php

namespace App\Services\Data\Controller\Restore;

use App\Models\Data\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Controller $controller): void
    {
        try {
            DB::beginTransaction();

            $controller->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
