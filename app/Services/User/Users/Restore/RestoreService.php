<?php

namespace App\Services\User\Users\Restore;

use Exception;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;

class RestoreService
{
    /**
     * @throws Exception
     */
    public function restore(User $user): void
    {
        try {
            DB::beginTransaction();

            $user->restore();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
