<?php

namespace Database\Factories\Inn;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inn\Inn>
 */
class InnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->streetName,
            'description' => $this->faker->text,
            'identification_number' => $this->faker->randomNumber(8),
            'establishment' => $this->faker->date(),
            'user_id' => User::inRandomOrder()->first() ?? User::factory(),
        ];
    }
}
