<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

use App\Models\Data\Diapason\Diapason;

trait ActionOnDiapason
{
    protected array $diapasonForm = [
        'number' => null,
        'name' => null,
        'controller' => [
            'id' => null,
            'address' => null,
            'is_new' => false,
        ],
    ];

    public function changeDiapason(Diapason $diapason, $name): void
    {
        $id = $diapason->id;

        if (array_key_exists($id, $this->data['diapasons']['chosen_diapasons'])) {
            unset($this->data['diapasons']['chosen_diapasons'][$id]);
        } else {
            $this->diapasonForm['number'] = $diapason->technology->code . $this->position->region->code;
            $this->diapasonForm['name'] = $name;

            $this->data['diapasons']['chosen_diapasons'][$id] = $this->diapasonForm;
        }
    }
}
