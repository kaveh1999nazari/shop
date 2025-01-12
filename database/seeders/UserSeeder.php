<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'kaveh',
            'last_name' => 'nazari',
            'email' => 'kaveh1999nazari@gmail.com',
            'mobile' => '09387578068',
            'password' => '12345678',
            'national_code' => '1743141688',
            'father_name' => 'navid',
            'role' => 'admin',
        ]);
    }
}
