<?php

namespace App\Services\User\Permissions\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Permission $permission): void
    {
        try {
            DB::beginTransaction();

            $permission->update(['content' => $data['permission']['content']]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
