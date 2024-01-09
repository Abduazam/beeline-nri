<?php

namespace Database\Seeders\UserSection;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $permissions = [
                /**
                 * Creating user section permissions.
                 */
                'user section',
                'roles section',
                'users section',
                'permissions section',
                /**
                 * Creating roles section permissions.
                 */
                'create role',
                'edit role',
                'delete role',
                'restore role',
                'force delete role',
                'view role',
                /**
                 * Creating users section permissions.
                 */
                'create user',
                'edit user',
                'delete user',
                'restore user',
                'force delete user',
                'view user',

                /**
                 * Creating widget section permissions.
                 */
                'widget section',
                'languages section',
                'table columns section',
                'text names section',
                /**
                 * Creating languages section permissions.
                 */
                'create language',
                'edit language',
                'delete language',
                'restore language',
                'force delete language',
                'view language',
                /**
                 * Creating table column section permissions.
                 */
                'create table column',
                'edit table column',
                'delete table column',
                'restore table column',
                'force delete table column',
                'view table column',
                /**
                 * Creating text names section permissions.
                 */
                'create text name',
                'edit text name',
                'delete text name',
                'restore text name',
                'force delete text name',
                'view text name',

                /**
                 * Creating areas section permissions.
                 */
                'area section',
                'branches section',
                'regions section',
                'areas section',
                /**
                 * Creating branches section permissions.
                 */
                'create branch',
                'edit branch',
                'delete branch',
                'restore branch',
                'force delete branch',
                'view branch',
                /**
                 * Creating regions section permissions.
                 */
                'create region',
                'edit region',
                'delete region',
                'restore region',
                'force delete region',
                'view region',
                /**
                 * Creating areas section permissions.
                 */
                'create area',
                'edit area',
                'delete area',
                'restore area',
                'force delete area',
                'view area',

                /**
                 * Creating data section permissions.
                 */
                'data section',
                'place types section',
                'place type groups section',
                'purposes section',
                'coordinate types section',
                'application types section',
                'statuses section',
                'states section',
                'companies section',
                'controllers section',
                'technologies section',
                'diapasons section',
                'room-types section',
                'hardware-rooms section',
                'hardware-owners section',
                'location-antennas section',
                'general-contractor-types section',
                'general-contractors section',
                'k-as section',
                /**
                 * Creating place types section permissions.
                 */
                'create place type',
                'edit place type',
                'delete place type',
                'restore place type',
                'force delete place type',
                'view place type',
                /**
                 * Creating place type groups section permissions.
                 */
                'create place type group',
                'edit place type group',
                'delete place type group',
                'restore place type group',
                'force delete place type group',
                'view place type group',
                /**
                 * Creating purposes section permissions.
                 */
                'create purpose',
                'edit purpose',
                'delete purpose',
                'restore purpose',
                'force delete purpose',
                'view purpose',

                /**
                 * Creating coordinate types section permissions.
                 */
                'create coordinate type',
                'edit coordinate type',
                'delete coordinate type',
                'restore coordinate type',
                'force delete coordinate type',
                'view coordinate type',
                /**
                 * Creating application types section permissions.
                 */
                'edit application type',
                /**
                 * Creating statuses section permissions.
                 */
                'edit status',
                /**
                 * Creating states section permissions.
                 */
                'edit state',
                /**
                 * Creating companies section permissions.
                 */
                'create company',
                'edit company',
                'delete company',
                'restore company',
                'force delete company',
                'view company',
                /**
                 * Creating controllers section permissions.
                 */
                'create controller',
                'edit controller',
                'delete controller',
                'restore controller',
                'force delete controller',
                'view controller',
                /**
                 * Creating technologies section permissions.
                 */
                'create technology',
                'edit technology',
                'delete technology',
                'restore technology',
                'force delete technology',
                'view technology',
                /**
                 * Creating diapasons section permissions.
                 */
                'create diapason',
                'edit diapason',
                'delete diapason',
                'restore diapason',
                'force delete diapason',
                'view diapason',
                /**
                 * Creating room-types section permissions.
                 */
                'create room-type',
                'edit room-type',
                'delete room-type',
                'restore room-type',
                'force delete room-type',
                'view room-type',
                /**
                 * Creating hardware-rooms section permissions.
                 */
                'create hardware-room',
                'edit hardware-room',
                'delete hardware-room',
                'restore hardware-room',
                'force delete hardware-room',
                'view hardware-room',
                /**
                 * Creating hardware-owners section permissions.
                 */
                'create hardware-owner',
                'edit hardware-owner',
                'delete hardware-owner',
                'restore hardware-owner',
                'force delete hardware-owner',
                'view hardware-owner',
                /**
                 * Creating location-antennas section permissions.
                 */
                'create location-antenna',
                'edit location-antenna',
                'delete location-antenna',
                'restore location-antenna',
                'force delete location-antenna',
                'view location-antenna',
                /**
                 * Creating general-contractor-types section permissions.
                 */
                'create general-contractor-type',
                'edit general-contractor-type',
                'delete general-contractor-type',
                'restore general-contractor-type',
                'force delete general-contractor-type',
                'view general-contractor-type',
                /**
                 * Creating general-contractors section permissions.
                 */
                'create general-contractor',
                'edit general-contractor',
                'delete general-contractor',
                'restore general-contractor',
                'force delete general-contractor',
                'view general-contractor',
                /**
                 * Creating k-as section permissions.
                 */
                'create k-a',
                'edit k-a',
                'delete k-a',
                'restore k-a',
                'force delete k-a',
                'view k-a',

                /**
                 * Creating workflow section permissions.
                 */
                'workflow section',
                'position workflow section',
                'base-station workflow section',
                /**
                 * Creating position workflows section permissions.
                 */
                'create position workflow',
                'edit position workflow',
                'delete position workflow',
                'restore position workflow',
                'force delete position workflow',
                'view position workflow',
                /**
                 * Creating position workflow users section permissions.
                 */
                'create position workflow user',
                'delete position workflow user',
                'restore position workflow user',
                'force delete position workflow user',
                /**
                 * Creating position workflows section permissions.
                 */
                'create base-station workflow',
                'edit base-station workflow',
                'delete base-station workflow',
                'restore base-station workflow',
                'force delete base-station workflow',
                'view base-station workflow',
                /**
                 * Creating base-station workflow users section permissions.
                 */
                'create base-station workflow user',
                'delete base-station workflow user',
                'restore base-station workflow user',
                'force delete base-station workflow user',
                /**
                 * Creating positions section permissions.
                 */
                'positions section',
                'position section',
                'view position',
                /**
                 * Creating positions section permissions.
                 */
                'base-stations section',
                'base-station section',
                'view base-station',
            ];

            $permissions2 = [
                'create position',
                'edit position',
                'delete position',
                'restore position',
                'force delete position',
                'accept position',
                'cancel position',
                'send position',

                'create base-station',
                'edit base-station',
                'delete base-station',
                'restore base-station',
                'force delete base-station',
                'accept base-station',
                'cancel base-station',
                'send base-station',
            ];

            $admin = Role::findByName('admin');

            foreach ($permissions as $permissionName) {
                $permission = Permission::create(['name' => $permissionName]);
                $admin->givePermissionTo($permission);
            }

            foreach ($permissions2 as $permissionName) {
                Permission::create(['name' => $permissionName]);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }
    }
}
