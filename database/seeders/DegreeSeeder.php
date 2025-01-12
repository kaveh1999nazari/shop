<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    public function run(): void
    {
        $degrees = [
            'High School Diploma',
            'Associate Degree',
            "Bachelor's Degree",
            "Master's Degree",
            'Doctorate (PhD)',
            'Professional Certificate',
            'Vocational Training',
            'Postdoctoral Research',
            'Technical Diploma',
            'Honors Diploma',
        ];

        foreach ($degrees as $degree) {
            Degree::create(['name' => $degree]);
        }
    }
}
