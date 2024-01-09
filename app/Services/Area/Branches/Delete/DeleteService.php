<?php

namespace App\Services\Area\Branches\Delete;

use App\Models\Area\Branch\Branch;

class DeleteService
{
    public function delete(Branch $branch): void
    {
        $branch->delete();
    }
}
