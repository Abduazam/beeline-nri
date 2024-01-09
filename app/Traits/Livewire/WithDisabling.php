<?php

namespace App\Traits\Livewire;

trait WithDisabling
{
    public bool $disabled = true;

    private function updateDisabledState(array $data): void
    {
        $hasErrors = $this->hasErrors();
        $hasEmptyFields = $this->hasEmptyFields($data);

        $this->disabled = $hasErrors || $hasEmptyFields;
    }

    private function hasErrors(): bool
    {
        return count($this->getErrorBag()->all()) > 0;
    }

    private function hasEmptyFields(array $data, $parent = null): bool
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $parent === null ? $currentKey = $key : $currentKey = $parent . "->" . $key;

                if ($this->hasEmptyFields($value, $currentKey)) {
                    return true;
                }
            } else {
                if ($parent !== null) {
                    if (empty($this->$parent->$value)) {
                        return true;
                    }
                } else {
                    if (empty($this->$value)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
