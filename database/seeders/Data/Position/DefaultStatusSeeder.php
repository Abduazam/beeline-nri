<?php

namespace Database\Seeders\Data\Position;

use App\Models\Data\Position\Status\Status;
use App\Models\Data\Position\Status\StatusTranslation;
use Illuminate\Database\Seeder;

class DefaultStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'preparing' => 'В подготовке',
            'registered' => 'Зарегистрир',
            'in-work' => 'В работе',
            'executed' => 'Выполнена',
            'cancelled' => 'Отменана',
        ];

        foreach ($statuses as $key => $value) {
            $new = Status::create(['aim' => $key]);

            StatusTranslation::create([
                'status_id' => $new->id,
                'locale' => app()->getLocale(),
                'name' => $value,
            ]);
        }
    }
}
