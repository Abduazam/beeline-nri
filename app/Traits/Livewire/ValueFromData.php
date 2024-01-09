<?php

namespace App\Traits\Livewire;

use Illuminate\Support\Facades\App;

trait ValueFromData
{
    public function getValueFromData(array $data)
    {
        foreach ($data as $key => $value) {
            if ($key === App::getLocale()) {
                return $value;
            }
        }

        return null;
    }

    public function makeStringFromData(): void
    {
        $array = [$this->region, $this->area, $this->street_type_name, $this->street_name, $this->additional_info];
        $array = array_filter($array);
        $text = implode(', ', $array);
        if (isset($this->address)) {
            $this->address = $text;
        } else {
            $this->position->address = $text;
        }
    }
}
