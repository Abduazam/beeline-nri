<?php

namespace App\Services\Imports\Users;

use App\Helpers\Helper;

class GenerateUserMailService
{
    public function __construct(protected string $name) { }

    public function generate(): string
    {
        $data = explode(" ", $this->name);
        $user_name = $data[1];
        $user_last_name = $data[0];

        return Helper::transliterate($user_name) . Helper::transliterate($user_last_name) . "@beeline.uz";
    }
}
