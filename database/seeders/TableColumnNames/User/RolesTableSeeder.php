<?php

namespace Database\Seeders\TableColumnNames\User;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "name" => "Название",
            "guard_name" => "Гуард название",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'roles',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
