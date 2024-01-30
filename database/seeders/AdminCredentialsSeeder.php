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
            "email" => "startadministrator@psu.edu.ph",
            "password" => Hash::make('startadministrator@psu.edu.ph'),
        ]);
    }
}
