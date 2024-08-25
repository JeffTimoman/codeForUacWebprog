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
            'name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'phone' => '+6281234567890',
            "password" => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        for($i = 1; $i <= 10; $i++){
            User::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'password' => bcrypt('admin123'),
                'role' => 'user'
            ]);
        }
    }
}
