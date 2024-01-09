<?php

namespace Database\Seeders\Data\HardwareRoom;

use App\Models\Data\HardwareRoom\HardwareRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultHardwareRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hardware_rooms = [
            'Подвал',
            'Технический этаж',
            'На земле',
            'На крыше',
            'На башне',
        ];

        foreach ($hardware_rooms as $hardware_room) {
            HardwareRoom::create([
                'title' => $hardware_room
            ]);
        }
    }
}
