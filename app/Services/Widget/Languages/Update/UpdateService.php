<?php

namespace App\Services\Widget\Languages\Update;

use Exception;
use App\Models\Widget\Language;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @throws Exception
     */
    public function update(array $data, Language $language): void
    {
        try {
            DB::beginTransaction();

            $language->update(['title' => $data['language']['title']]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
