<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            1 => ['Tabriz', 'Maragheh', 'Marand', 'Ahar'],
            2 => ['Urmia', 'Khoy', 'Mahabad', 'Oshnavieh'],
            3 => ['Ardabil', 'Parsabad', 'Meshgin Shahr'],
            4 => ['Isfahan', 'Kashan', 'Najafabad', 'Shahin Shahr'],
            5 => ['Karaj', 'Nazariyeh', 'Eshtehard'],
            6 => ['Ilam', 'Dehloran', 'Mehran'],
            7 => ['Bushehr', 'Borazjan', 'Ganaveh'],
            8 => ['Tehran', 'Varamin', 'Eslamshahr', 'Pakdasht'],
            9 => ['Shahr-e Kord', 'Borujen', 'Lordegan'],
            10 => ['Birjand', 'Qaen', 'Ferdows'],
            11 => ['Mashhad', 'Neyshabur', 'Sabzevar', 'Torbat-e Heydarieh'],
            12 => ['Bojnurd', 'Shirvan', 'Esfarayen'],
            13 => ['Ahvaz', 'Abadan', 'Dezful', 'Khorramshahr'],
            14 => ['Zanjan', 'Abhar', 'Khorramdarreh'],
            15 => ['Semnan', 'Shahrood', 'Damghan'],
            16 => ['Zahedan', 'Chabahar', 'Iranshahr'],
            17 => ['Shiraz', 'Marvdasht', 'Jahrom'],
            18 => ['Qazvin', 'Takestan', 'Abyek'],
            19 => ['Qom'],
            20 => ['Sanandaj', 'Marivan', 'Baneh'],
            21 => ['Kerman', 'Rafsanjan', 'Sirjan'],
            22 => ['Kermanshah', 'Eslamabad-e Gharb', 'Paveh'],
            23 => ['Yasuj', 'Dehdasht'],
            24 => ['Gorgan', 'Gonbad-e Kavus', 'Bandar Torkaman'],
            25 => ['Rasht', 'Bandar Anzali', 'Lahijan'],
            26 => ['Khorramabad', 'Borujerd', 'Dorud'],
            27 => ['Sari', 'Amol', 'Babolsar'],
            28 => ['Arak', 'Saveh', 'Khomein'],
            29 => ['Bandar Abbas', 'Minab', 'Qeshm'],
            30 => ['Hamadan', 'Malayer', 'Nahavand'],
            31 => ['Yazd', 'Ardakan', 'Mehriz'],
        ];

        foreach ($cities as $provinceId => $cityList) {
            foreach ($cityList as $city) {
                City::create([
                    'province_id' => $provinceId,
                    'name' => $city,
                ]);
            }
        }
    }

}
