<?php

namespace Database\Seeders\Data\RoomType;

use App\Models\Data\RoomType\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultRoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room_types = [
            'Существующее',
            'Выгородка',
            'Общий зал',
            'Сооружаемое',
            'Контейнер',
            'Термобокс',
        ];

        foreach ($room_types as $room_type) {
            RoomType::create([
                'title' => $room_type
            ]);
        }
    }
}
