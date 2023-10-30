<?php

namespace Database\Factories\Inn;

use App\Models\Inn\Inn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inn\OpeningHour>
 */
class OpeningHourFactory extends Factory
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
            'day_of_week' => $this->faker->dayOfWeek,
            'open_from' => $this->faker->time,
            'open_to' => $this->faker->time,
            'is_closed' => $this->faker->boolean,
            'exception' => $this->faker->boolean,
            'exception_date' => $this->faker->date,
        ];
    }
}
