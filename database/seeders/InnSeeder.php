<?php

namespace Database\Seeders;

use App\Models\Inn\Address;
use App\Models\Inn\Contact;
use App\Models\Inn\Inn;
use App\Models\Inn\OpeningHour;
use App\Models\Inn\Owner;
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
            Owner::factory(1)->create([
                'inn_id' => $inn->id,
            ]);
            Contact::factory(1)->create([
                'inn_id' => $inn->id,
            ]);
            Address::factory(1)->create([
                'inn_id' => $inn->id,
            ]);

            foreach (range(1, 7) as $day) {
                OpeningHour::factory(1)->create([
                    'inn_id' => $inn->id,
                    'open_from' => '08:00',
                    'open_to' => '20:00',
                    'day_of_week' => $day,
                ]);
            }
        }
    }
}
