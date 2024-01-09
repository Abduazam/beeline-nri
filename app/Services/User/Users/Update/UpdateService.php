<?php

namespace App\Services\User\Users\Update;

use Exception;
use App\Helpers\Helper;
use App\Models\User\User;
use App\Models\User\ModelHasRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\User\Users\CreateRole\CreateRoleService;
use App\Services\User\Users\CreateBranch\CreateBranchService;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(User $user, array $data, mixed $image): void
    {
        try {
            DB::beginTransaction();

            $newImage = Helper::checkImage($image, 'users', $user);

            $user->name = $data['user']['name'];
            $user->email = $data['user']['email'];
            if ($data['password'] != null) {
                $user->password = Hash::make($data['password']);
            }
            if (isset($newImage)) {
                $user->image = $newImage;
            }
            $user->save();

            if (array_key_exists('role_id', $data)) {
                $user_role = ModelHasRole::query()->where('model_id', $user->id)->first();
                if ($user_role) {
                    ModelHasRole::where('model_id', $user->id)->update([
                        'role_id' => $data['role_id']
                    ]);
                } else {
                    $user->assignRole($data['role_id']);
                }
            }

            if (!empty($data['user_branches'])) {
                new CreateBranchService($data['user_branches'], $user);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
