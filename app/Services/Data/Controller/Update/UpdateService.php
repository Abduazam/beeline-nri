<?php

namespace App\Services\Data\Controller\Update;

use App\Models\Data\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateService
{
    /**
     * @throws Throwable
     */
    public function update(Controller $controller, array $data): void
    {
        try {
            DB::beginTransaction();

            $controller->update([
                'region_id' => $data['controller']['region_id'],
                'number' => $data['controller']['number'],
                'name' => $data['controller']['name'],
                'gfk' => $data['controller']['gfk'],
                'number_position' => $data['controller']['number_position'],
                'position' => $data['controller']['position'],
                'address' => $data['controller']['address'],
                'state_id' => $data['controller']['state_id'],
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
