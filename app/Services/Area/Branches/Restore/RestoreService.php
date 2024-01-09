<?php

namespace App\Services\Area\Branches\Restore;

use App\Models\Area\Branch\Branch;

class RestoreService
{
    public function restore(Branch $branch): void
    {
        $branch->restore();
    }
}
