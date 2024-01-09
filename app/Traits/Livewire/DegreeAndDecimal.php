<?php

namespace App\Traits\Livewire;

use App\Helpers\Helper;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\NoReturn;

trait DegreeAndDecimal
{
    public int $degree = 1;
    public int $decimal = 2;
    public string $degree_name = 'degree';
    public string $decimal_name = 'decimal';

    public array $coordinate_values = [
        'latitude' => [
            'degree' => null,
            'decimal' => null
        ],
        'longitude' => [
            'degree' => null,
            'decimal' => null,
        ]
    ];

    public array $degree_values = [
        'latitude' => [
            'degree' => null,
            'minute' => null,
            'second' => null,
        ],
        'longitude' => [
            'degree' => null,
            'minute' => null,
            'second' => null,
        ]
    ];

    public function handleUpdatedProperty($property, Helper $helper): void
    {
        $explodedData = explode('.', $property);
        $key = $explodedData[0];
        $value = $explodedData[1];

        if (is_numeric($this->coordinate_values[$key][$value])) {
            if ($value === $this->decimal_name) {
                $in_degree = $helper->decimalToDegree($this->coordinate_values[$key][$value]);
                $explodedInDegree = explode(" ", $in_degree);

                $this->degree_values[$key]['degree'] = $explodedInDegree[0];
                $this->degree_values[$key]['minute'] = $explodedInDegree[1];
                $this->degree_values[$key]['second'] = $explodedInDegree[2];
            }
        } else {
            if ($value === $this->decimal_name) {
                $this->degree_values[$key]['degree'] = null;
                $this->degree_values[$key]['minute'] = null;
                $this->degree_values[$key]['second'] = null;
            }
        }
    }

    #[NoReturn]
    public function handleUpdatedDegreeProperty($property, Helper $helper): void
    {
        try {
            $this->validateOnly('degree_values.'.$property.'.degree');
            $this->validateOnly('degree_values.'.$property.'.minute');
            $this->validateOnly('degree_values.'.$property.'.second');

            $this->coordinate_values[$property][$this->decimal_name] = $helper->degreeToDecimal($this->degree_values, $property);
        } catch (\Throwable $e) {
            $this->coordinate_values[$property][$this->decimal_name] = null;
        }
    }
}
