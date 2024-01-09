<?php

namespace Database\Seeders\TableColumnNames\User;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "name" => "Имя",
            "email" => "Э. почта",
            "email_verified_at" => "Почта подтверждена на",
            "password" => "Пароль",
            "image" => "Фото",
            "two_factor_secret" => "Двухфакторный секрет",
            "two_factor_recovery_codes" => "Двухфакторные коды восстановления",
            "two_factor_confirmed_at" => "Два фактора подтверждено в",
            "remember_token" => "Запомнить токен",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'users',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
