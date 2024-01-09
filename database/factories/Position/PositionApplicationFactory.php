<?php

namespace Database\Factories\Position;

use App\Models\Positions\PositionApplications\PositionApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PositionApplication>
 */
class PositionApplicationFactory extends Factory
{
    protected $model = PositionApplication::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(10000, 90000),
            'position_id' =>  PositionFactory::new()->create()->id,
            'application_type_id' => 1,
            'user_id' => 2,
            'comment' => $this->faker->sentence(10),
            'status_id' => $this->faker->numberBetween(1, 5),
            'active' => true,
        ];
    }
}
