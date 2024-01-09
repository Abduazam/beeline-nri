<?php

namespace Database\Seeders\TableColumnNames\User;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "user_id" => "Пользователь",
            "branch_id" => "Филиал",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'user_branches',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
