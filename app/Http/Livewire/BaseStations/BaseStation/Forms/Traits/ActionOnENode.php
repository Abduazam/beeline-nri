<?php

namespace App\Http\Livewire\BaseStations\BaseStation\Forms\Traits;

trait ActionOnENode
{
    protected array $e_node = [
        'e_node_b_id' => null,
        'diapason' => [
            'id' => null,
            'name' => null,
        ],
    ];

    public function addENode(): void
    {
        $this->data['e_nodes'][] = $this->e_node;
    }

    public function removeENode($index): void
    {
        unset($this->data["e_nodes"][$index]);
    }

    public function getDiapasonLTE($index): void
    {
        foreach ($this->data['diapasons']['chosen_diapasons'] as $diapason_id => $value) {
            if (str_starts_with($value['name'], "LTE")) {
                $this->data['e_nodes'][$index]['diapason']['id'] = $diapason_id;
                $this->data['e_nodes'][$index]['diapason']['name'] = $value['name'];
                break;
            }
        }
    }
}
