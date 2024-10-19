<?php

namespace Database\Seeders;

use App\Models\OptionValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OptionValue::query()->create(['option_id'=>'1', 'name' => 'Red']);
        OptionValue::query()->create(['option_id'=>'1', 'name' => 'Blue']);
        OptionValue::query()->create(['option_id'=>'1', 'name' => 'Black']);
        OptionValue::query()->create(['option_id'=>'1', 'name' => 'white']);
        OptionValue::query()->create(['option_id'=>'1', 'name' => 'purple']);
        OptionValue::query()->create(['option_id'=>'1', 'name' => 'pink']);
        OptionValue::query()->create(['option_id'=>'2', 'name' => '32GB']);
        OptionValue::query()->create(['option_id'=>'2', 'name' => '64GB']);
        OptionValue::query()->create(['option_id'=>'2', 'name' => '128GB']);
        OptionValue::query()->create(['option_id'=>'2', 'name' => '256GB']);
        OptionValue::query()->create(['option_id'=>'2', 'name' => '512GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '2GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '4GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '6GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '8GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '12GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '14GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '16GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '18GB']);
        OptionValue::query()->create(['option_id'=>'3', 'name' => '24GB']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '35']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '36']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '37']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '38']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '39']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '40']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '41']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => '42']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => 'XXXL']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => 'XXL']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => 'XL']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => 'L']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => 'M']);
        OptionValue::query()->create(['option_id'=>'4', 'name' => 'S']);
    }
}
