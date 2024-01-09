<?php

namespace Database\Seeders\UserSection;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        $user = User::create([
            'name' => 'Sardor Rakhmatullaev',
            'email' => 'SRakhmatullaev@beeline.uz',
            'password' => Hash::make('123'),
        ]);

        $user->assignRole($role);
    }
}
