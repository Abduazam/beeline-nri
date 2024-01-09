<?php

namespace App\Models\Positions\PositionApplications\Traits;

use App\Models\Data\Position\Status\Status;

trait StatusCheckingTrait
{
    public function isPreparing(): bool
    {
        $status = Status::where('aim', 'preparing')->first();

        if ($this->status_id === $status->id) {
            return true;
        }

        return false;
    }

    public function isRegistered(): bool
    {
        $status = Status::where('aim', 'registered')->first();

        if ($this->status_id === $status->id) {
            return true;
        }

        return false;
    }

    public function isInWork(): bool
    {
        $status = Status::where('aim', 'in-work')->first();

        if ($this->status_id === $status->id) {
            return true;
        }

        return false;
    }

    public function isExecuted(): bool
    {
        $status = Status::where('aim', 'executed')->first();

        if ($this->status_id === $status->id) {
            return true;
        }

        return false;
    }

    public function isCancelled(): bool
    {
        $status = Status::where('aim', 'cancelled')->first();

        if ($this->status_id === $status->id) {
            return true;
        }

        return false;
    }
}
