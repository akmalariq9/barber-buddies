<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarberShopSchedule>
 */
class BarberShopScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $openingHours = $this->faker->numberBetween(8, 17);
        $closingHours = $this->faker->numberBetween($openingHours + 1, 23);
        return [
            'barber_shop_id' => \App\Models\BarberShop::factory(),
            'day' => $this->faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']),
            'opening_hours' => sprintf('%02d:00:00', $openingHours), // Formatkan waktu dengan menambahkan nol di depan jika hanya satu digit
            'closing_hours' => sprintf('%02d:00:00', $closingHours),
        ];
    }
}
