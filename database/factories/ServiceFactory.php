<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $serviceNames = [
            'Haircut services',
            'Beard trimming',
            'Shaving',
            'Hair styling',
            'Hot towel treatment',
            'Head massage',
            'Facial treatments',
            'Coloring services',
            'Hair wash and conditioning',
            'Consultation for hairstyle recommendations'
        ];

        $barberid = [
            '1',
            '3',
            '4',
            '7',
            '9'
        ];
    
        return [
            'name' => $this->faker->randomElement($serviceNames),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0, 100000),
            'duration' => $this->faker->numberBetween(30, 180),
            'barber_shop_id' => $this->faker->randomElement($barberid),
        ];
    }
}
