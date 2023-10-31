<?php

namespace Database\Factories\Inn;

use App\Models\Inn\Inn;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inn\Address>
 */
class AddressFactory extends Factory
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
            'country' => $this->faker->countryCode,
            'street' => $this->faker->streetName,
            'post_code' => substr($this->faker->postcode, 0, 5),
            'city' => $this->faker->city,
        ];
    }
}
