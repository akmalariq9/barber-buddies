<?php

namespace Database\Factories;

use App\Models\Capster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class CapsterFactory extends Factory
{
    protected $model = Capster::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'description' => $this->faker->paragraph(),
            'barber_shop_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
