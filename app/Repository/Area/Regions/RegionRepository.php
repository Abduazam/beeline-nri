<?php

namespace App\Repository\Area\Regions;

use App\Models\Area\Region\Region;
use Illuminate\Database\Eloquent\Collection;

class RegionRepository
{
    public function getAll(): Collection|array
    {
        return Region::with('translations')->select(['id', 'branch_id', 'created_at', 'deleted_at'])->get();
    }
}
