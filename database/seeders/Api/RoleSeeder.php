<?php

namespace Database\Seeders\Api;

use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => UserRole::USER->value]);
        Role::create(['name' => UserRole::ADMIN->value]);
        Role::create(['name' => UserRole::SUPERADMIN->value]);
    }
}
