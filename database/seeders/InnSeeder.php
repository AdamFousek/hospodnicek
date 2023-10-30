<?php

namespace Database\Seeders;

use App\Models\Inn\Inn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inns = Inn::factory(10)->create();

        /** @var Inn $inn */
        foreach ($inns as $inn) {
            $inn->owner()->create(['inn_id' => $inn->id]);
            $inn->contact()->create(['inn_id' => $inn->id]);
            $inn->address()->create(['inn_id' => $inn->id]);

            foreach (range(1, 7) as $day) {
                $inn->openingHours()->create([
                    'day_of_week' => $day,
                    'open' => '08:00',
                    'close' => '20:00',
                    'exception' => false,
                ]);
            }
        }
    }
}
