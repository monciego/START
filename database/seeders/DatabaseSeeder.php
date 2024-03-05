<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(AdminCredentialsSeeder::class);
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            "name" => "Jericho Bantiquete",
            "strand" => "STEM",
            "birthdate" => "2000-01-10",
            "gender" => "Male",
            "grade_level" => "Grade 12",
            "school" => "Pangasinan State University",
            "email" => "jerichobantiquete@gmail.com",
            "password" => Hash::make('$Password1234'),
        ]);

        $user->addRole("user");

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
