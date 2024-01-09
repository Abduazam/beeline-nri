<?php

namespace App\Services\Widget\Languages\Create;

use Exception;
use App\Models\Widget\Language;
use Illuminate\Support\Facades\DB;

class CreateService
{
    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $slug = strtolower($data['slug']);

            Language::create([
                'slug' => $slug,
                'title' => $data['title'],
            ]);

            new CreateAppTextsService($slug);
            new CreateTableColumnNamesService($slug);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
