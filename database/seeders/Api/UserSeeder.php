<?php

namespace Database\Seeders\Api;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Samuel',
            'last_name' => 'Abiodun',
            'name' => "Samuel Abiodun",
            'email' => 'abiodunsamyemi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Stevinz@007#'),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'name' => "Admin",
            'email' => 'stevinzsharklogistics1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Stevinz@007#'),
            'remember_token' => Str::random(10),
        ]);
    }
}
