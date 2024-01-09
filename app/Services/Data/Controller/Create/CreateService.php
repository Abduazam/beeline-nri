<?php

namespace App\Services\Data\Controller\Create;

use App\Models\Data\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateService
{
    /**
     * @throws Throwable
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            Controller::create([
                'region_id' => $data['region_id'],
                'number' => $data['number'],
                'name' => $data['name'],
                'gfk' => $data['gfk'],
                'number_position' => $data['number_position'],
                'position' => $data['position'],
                'address' => $data['address'],
                'state_id' => $data['state_id'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
