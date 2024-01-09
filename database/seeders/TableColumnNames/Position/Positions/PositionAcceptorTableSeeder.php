<?php

namespace Database\Seeders\TableColumnNames\Position\Positions;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionAcceptorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "position_id" => "Позиции",
            "workflow_id" => "Этап",
            "user_id" => "Пользователь",
            "comment" => "Коммент",
            "active" => "Актив",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'position_acceptors',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
