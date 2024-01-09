<?php

namespace App\Services\User\Roles\Create;

use Exception;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $role = Role::create(['name' => strtolower($data['name'])]);

            $permissions = Permission::query()->whereIn('id', $data['permissions'])->get();
            $role->givePermissionTo($permissions);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
