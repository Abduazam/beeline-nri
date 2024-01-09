<?php

namespace App\Services\User\Users\Create;

use Exception;
use App\Helpers\Helper;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\User\Users\CreateRole\CreateRoleService;
use App\Services\User\Users\CreateBranch\CreateBranchService;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data, mixed $image): void
    {
        try {
            DB::beginTransaction();

            $newImage = Helper::checkImage($image, 'users');

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->image = $newImage;
            $user->save();

            $user->assignRole($data['role_id']);
            new CreateBranchService($data['user_branches'], $user);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
