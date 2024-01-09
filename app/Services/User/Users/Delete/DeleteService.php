<?php

namespace App\Services\User\Users\Delete;

use Exception;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DeleteService
{
    /**
     * @throws Exception
     */
    public function delete(User $user): void
    {
        try {
            DB::beginTransaction();

            if ($user->trashed()) {
                if (isset($user->image) and File::exists(public_path('storage/' . $user->image))) {
                    unlink(storage_path('app/public/' . $user->image));
                }

                $user->forceDelete();
            } else {
                $user->delete();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
