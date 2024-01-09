<?php

namespace App\Services\User\Roles\Delete;

use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(Role $role): void
    {
        try {
            DB::beginTransaction();

            if ($role->trashed()) {
                $role->forceDelete();
            } else {
                $role->delete();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
