<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BarberShop;

class BarberShopFactory extends Factory
{
    protected $model = BarberShop::class;
    //make array for opening hour
    protected $operatingHours = [
        '08:00 - 18:00',
        '09:00 - 19:00',
        '10:00 - 20:00',
        '11:00 - 21:00',
        '12:00 - 22:00',
    ];

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'operating_hours' => $this->operatingHours[rand(0, 4)],
            'description' => $this->faker->text,
        ];
    }
}