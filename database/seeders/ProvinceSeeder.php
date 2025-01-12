<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            'East Azerbaijan',
            'West Azerbaijan',
            'Ardabil',
            'Isfahan',
            'Alborz',
            'Ilam',
            'Bushehr',
            'Tehran',
            'Chaharmahal and Bakhtiari',
            'South Khorasan',
            'Razavi Khorasan',
            'North Khorasan',
            'Khuzestan',
            'Zanjan',
            'Semnan',
            'Sistan and Baluchestan',
            'Fars',
            'Qazvin',
            'Qom',
            'Kurdistan',
            'Kerman',
            'Kermanshah',
            'Kohgiluyeh and Boyer-Ahmad',
            'Golestan',
            'Gilan',
            'Lorestan',
            'Mazandaran',
            'Markazi',
            'Hormozgan',
            'Hamadan',
            'Yazd',
        ];

        foreach ($provinces as $province) {
            Province::create(['name' => $province]);
        }
    }

}
