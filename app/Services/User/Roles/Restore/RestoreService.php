<?php

namespace App\Services\User\Roles\Restore;

use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(Role $role): void
    {
        try {
            DB::beginTransaction();

            $role->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
