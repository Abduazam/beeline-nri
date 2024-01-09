<?php

namespace App\Services\User\Roles\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Role $role): void
    {
        try {
            DB::beginTransaction();

            $role->update(['name' => $data['role']['name']]);

            $newPermissions = $data['permissions'];
            $currentPermissions = $role->permissions;
            $permissionsToRemove = $currentPermissions->reject(function ($permission) use ($newPermissions) {
                return in_array($permission->name, $newPermissions);
            });

            $role->revokePermissionTo($permissionsToRemove);

            $permissions = collect($newPermissions)->diff($currentPermissions->pluck('name')->toArray());
            $role->givePermissionTo($permissions);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
