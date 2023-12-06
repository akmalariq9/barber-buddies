<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BarberShop;
use App\Models\User;

class BarberShopFactory extends Factory
{
    protected $model = BarberShop::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        
        $check_barbershop = BarberShop::where('user_id', $user->id)->first();
        if ($check_barbershop) {
            $user = User::inRandomOrder()->first();
        }
        
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'worker' => $this->faker->numberBetween(1,100),
            'user_id' => $user->id,
        ];
    }
}