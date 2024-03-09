<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminCredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrator = \App\Models\User::factory()->create([
            "name" => "Administrator",
            "strand" => "",
            "grade_level" => "",
            "birthdate" => "",
            "gender" => "",
            "school" => "Pangasinan State University",
            "email" => "istartpsu@gmail.com",
            "password" => Hash::make('istart.1'),
        ]);

        $administrator->addRole("superadministrator");

        $administrator2 = \App\Models\User::factory()->create([
            "name" => "Sir Jun",
            "strand" => "",
            "grade_level" => "",
            "birthdate" => "",
            "gender" => "Male",
            "school" => "Pangasinan State University",
            "email" => "jscamara2023@gmail.com",
            "password" => Hash::make('jscamara2023@gmail.com'),
        ]);

        $administrator2->addRole("superadministrator");
    }
}
