<?php

namespace App\Services\Widget\Languages\Create;

use Mockery\Exception;
use App\Models\Widget\TextName;
use Illuminate\Support\Facades\DB;

class CreateAppTextsService
{
    public function __construct(protected string $slug)
    {
        $this->createAppTexts($this->slug);
    }

    private function createAppTexts($slug): void
    {
        DB::beginTransaction();
        try {
            $texts = TextName::query()->select('key')
                ->whereNotIn('key', function ($query) use ($slug) {
                    $query->select('key')
                        ->from('text_names')
                        ->where('locale', '=', $slug);
                })
                ->distinct()
                ->get();

            if (count($texts) > 0) {
                foreach ($texts as $text) {
                    TextName::create([
                        'key' => $text->key,
                        'locale' => $slug,
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
