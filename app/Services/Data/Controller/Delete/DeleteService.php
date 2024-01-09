<?php

namespace App\Services\Data\Controller\Delete;

use Exception;
use App\Models\Data\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(Controller $controller): void
    {
        try {
            DB::beginTransaction();

            if ($controller->trashed()) {
                $controller->forceDelete();
            } else {
                $controller->delete();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
