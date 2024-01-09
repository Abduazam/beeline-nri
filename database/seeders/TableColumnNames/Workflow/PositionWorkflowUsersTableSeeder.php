<?php

namespace Database\Seeders\TableColumnNames\Workflow;;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PositionWorkflowUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "position_workflow_id" => "Этап",
            "user_id" => "Пользователь",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => App::getLocale(),
                'table_name' => 'position_workflow_users',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
