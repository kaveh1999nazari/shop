<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::query()->create(['name' => 'color']);
        Option::query()->create(['name' => 'capacity']);
        Option::query()->create(['name' => 'ram']);
        Option::query()->create(['name' => 'size']);
        Option::query()->create(['name' => 'weight']);
    }
}
