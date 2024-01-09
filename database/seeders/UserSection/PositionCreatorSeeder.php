<?php

namespace Database\Seeders\UserSection;

use App\Models\User\User;
use App\Models\User\UserBranch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PositionCreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $creatorRole = Role::create(['name' => 'position-creator']);
        $creatorRole->givePermissionTo([
            'positions section', 'position section', 'create position', 'edit position', 'view position', 'send position', 'delete position', 'restore position', 'force delete position',
            'base-stations section', 'base-station section', 'create base-station', 'edit base-station', 'view base-station', 'send base-station', 'delete base-station', 'restore base-station', 'force delete base-station',
        ]);
        $acceptorRole = Role::create(['name' => 'position-acceptor']);
        $acceptorRole->givePermissionTo([
            'positions section', 'position section', 'view position', 'accept position', 'cancel position',
            'base-stations section', 'base-station section', 'view base-station', 'accept base-station', 'cancel base-station',
        ]);

        $creators = [
            [
                'name' => 'Мухаммад Махсудов',
                'email' => 'krugdagilar@gmail.com',
            ],
        ];
        $acceptors = [
            [
                'name' => 'Азам Махсудов',
                'email' => 'amakhsudov@beeline.uz',
            ],
            [
                'name' => 'Абдуазам Махсудов',
                'email' => 'maxdov00a@gmail.com',
            ],
        ];

        foreach ($creators as $creator) {
            $mergedArray = array_merge($creator, ['password' => Hash::make('123')]);
            $user = User::create($mergedArray);
            UserBranch::create(['user_id' => $user->id, 'branch_id' => 3]);
            $user->assignRole($creatorRole);
        }

        foreach ($acceptors as $acceptor) {
            $mergedArray = array_merge($acceptor, ['password' => Hash::make('123')]);
            $user = User::create($mergedArray);
            UserBranch::create(['user_id' => $user->id, 'branch_id' => 3]);
            $user->assignRole($acceptorRole);
        }
    }
}
