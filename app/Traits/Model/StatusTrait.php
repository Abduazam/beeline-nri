<?php

namespace App\Traits\Model;

use App\Models\Widget\TextName;

trait StatusTrait
{
    /**
     * This function works for getting is model active or not by seeing is trashed, soft deleted.
     * @return string
     */
    public function getStatus(): string
    {
        if ($this->trashed()) {
            return '<span class="badge bg-pulse">' . TextName::getTextTranslation('inactive') . '</span>';
        }

        return '<span class="badge bg-success">' . TextName::getTextTranslation('active') . '</span>';
    }
}
