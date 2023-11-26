<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BarberShop;

class BarberShopFactory extends Factory
{
    protected $model = BarberShop::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'worker' => $this->faker->numberBetween(1,100)
        ];
    }
}