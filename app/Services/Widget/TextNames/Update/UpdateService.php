<?php

namespace App\Services\Widget\TextNames\Update;

use Exception;
use App\Models\Widget\TextName;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data): void
    {
        try {
            DB::beginTransaction();

            $key = $data['textKey'];
            foreach ($data['data'] as $lang => $value) {
                $text = TextName::query()
                    ->where('key', $key)
                    ->where('locale', $lang)->first();
                $text?->update(['translation' => $value]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
