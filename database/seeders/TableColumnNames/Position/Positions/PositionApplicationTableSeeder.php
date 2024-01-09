<?php

namespace Database\Seeders\TableColumnNames\Position\Positions;

use App\Models\Widget\TableColumnName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "id" => "ИД",
            "position_id" => "Позиции",
            "application_type_id" => "Тип заявок",
            "user_id" => "Инициатор",
            "comment" => "Комментарий",
            "status_id" => "Статус",
            'active' => "Актив",
            "created_at" => "Создан в",
            "updated_at" => "Обновлено в",
            "deleted_at" => "Удалено в",
        ];

        foreach ($data as $column_name => $value) {
            TableColumnName::create([
                'locale' => app()->getLocale(),
                'table_name' => 'position_applications',
                'column_name' => $column_name,
                'translation' => $value
            ]);
        }
    }
}
