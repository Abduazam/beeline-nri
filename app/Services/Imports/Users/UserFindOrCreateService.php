<?php

namespace App\Services\Imports\Users;

use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class UserFindOrCreateService
{
    public function __construct(
        protected string $mail,
        protected string $name
    ) { }

    public function findOrCreate(): User
    {
        return User::firstOrCreate(
            ['email' => $this->mail],
            [
                'name' => $this->name,
                'email' => $this->mail,
                'password' => '$2y$10$s9cXkyvTy0lGOy95Hha0EONzFfLbwEry3Dh8Fc2nYNM3wpf3t//Si'
            ]
        );
    }
}
