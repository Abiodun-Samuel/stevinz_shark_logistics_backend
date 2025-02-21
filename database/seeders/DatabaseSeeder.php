<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Api\Inventory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Api\LocationSeeder;
use Database\Seeders\Api\RoleSeeder;
use Database\Seeders\Api\UserSeeder;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            LocationSeeder::class,
            // InventorySeeder::class,
        ]);
    }
}
