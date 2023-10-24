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
        }
    }
}
