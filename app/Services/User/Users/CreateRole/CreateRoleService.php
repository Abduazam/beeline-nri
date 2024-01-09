<?php

namespace App\Services\User\Users\CreateRole;

use Exception;
use App\Models\User\User;
use App\Models\User\ModelHasRole;
use Illuminate\Support\Facades\DB;

class CreateRoleService
{
    /**
     * @throws Exception
     */
    public function __construct(
        protected array $data,
        protected User $user
    ) {
        $this->createUserRole();
    }

    /**
     * @throws Exception
     */
    private function createUserRole(): void
    {
        try {
            DB::beginTransaction();

            $user_role = new ModelHasRole();
            $user_role->role_id = $this->data['role_id'];
            $user_role->model_type = "App\\Models\\User\\User";
            $user_role->model_id = $this->user->id;
            $user_role->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
