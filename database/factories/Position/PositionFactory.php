<?php

namespace Database\Factories\Position;

use App\Models\Positions\Position\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    protected $model = Position::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->numberBetween(1000000,3000000),
            'source' => "NRI (Network Resource Inventory for mobile domain)",
            'company_id' => $this->faker->numberBetween(1, 2),
            'place_type_id' => $this->faker->numberBetween(1, 3),
            'place_type_group_id' => $this->faker->numberBetween(1, 10),
            'purpose_id' => $this->faker->numberBetween(1, 4),
            'region_id' => $this->faker->numberBetween(1, 2),
            'area_id' => $this->faker->numberBetween(1, 29),
            'name' => 'Place ' . $this->faker->unique()->numberBetween(1, 20),
            'territory_id' => $this->faker->numberBetween(1, 2),
            'address' => $this->faker->address,
            'coordinate_id' => 1,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'state_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
