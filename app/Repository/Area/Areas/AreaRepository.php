<?php

namespace App\Repository\Area\Areas;

use App\Models\Area\Area\Area;
use Illuminate\Database\Eloquent\Collection;

class AreaRepository
{
    public function getAll(): Collection|array
    {
        return Area::with('translations')->select(['id', 'region_id', 'created_at', 'deleted_at'])->get();
    }
}
