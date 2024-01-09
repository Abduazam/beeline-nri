<?php

namespace Database\Seeders\Data\Position;

use App\Models\Data\Position\State\State;
use App\Models\Data\Position\State\StateTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            'planned-and-operated' => "Планируется и эксплуатируется",
            'planned' => "Планируется",
            'operated' => "Эксплуатируется",
            'closed' => "Закрыта",
            'sketch' => "Эскиз",
        ];

        foreach ($states as $key => $value) {
            $new = State::create(['aim' => $key]);

            StateTranslation::create([
                'state_id' => $new->id,
                'locale' => app()->getLocale(),
                'name' => $value,
            ]);
        }
    }
}
