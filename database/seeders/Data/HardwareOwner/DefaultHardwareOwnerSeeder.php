<?php

namespace Database\Seeders\Data\HardwareOwner;

use App\Models\Data\HardwareOwner\HardwareOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultHardwareOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hardware_rooms = [
            'Вымпелком',
            'МТС',
            'Мегафон',
            'Ростелеком',
            'TELE2',
        ];

        foreach ($hardware_rooms as $hardware_room) {
            HardwareOwner::create([
                'title' => $hardware_room
            ]);
        }
    }
}
