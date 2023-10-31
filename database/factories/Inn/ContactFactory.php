<?php

namespace Database\Factories\Inn;

use App\Models\Inn\Inn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inn\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inn_id' => Inn::latest()->first() ?? Inn::factory(),
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'twitter' => $this->faker->url,
            'web' => $this->faker->url,
        ];
    }
}
