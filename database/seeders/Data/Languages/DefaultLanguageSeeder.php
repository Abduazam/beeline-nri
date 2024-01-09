<?php

namespace Database\Seeders\Data\Languages;

use App\Models\Widget\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'slug' => 'ru',
            'title' => 'Русский'
        ]);
    }
}
