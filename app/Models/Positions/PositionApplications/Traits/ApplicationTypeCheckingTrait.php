<?php

namespace App\Models\Positions\PositionApplications\Traits;

use App\Models\Data\ApplicationType\ApplicationType;

trait ApplicationTypeCheckingTrait
{
    public function isCreating(): bool
    {
        $type = ApplicationType::where('aim', 'create')->first();

        if ($this->application_type_id === $type->id) {
            return true;
        }

        return false;
    }

    public function isEditing(): bool
    {
        $type = ApplicationType::where('aim', 'edit')->first();

        if ($this->application_type_id === $type->id) {
            return true;
        }

        return false;
    }

    public function isDeleting(): bool
    {
        $type = ApplicationType::where('aim', 'delete')->first();

        if ($this->application_type_id === $type->id) {
            return true;
        }

        return false;
    }
}
