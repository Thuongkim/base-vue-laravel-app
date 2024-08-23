<?php

namespace Database\Seeders;

use App\Constants\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => Role::SUPER_ADMIN,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => Role::DEVELOPER,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => Role::STAFF_A,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => Role::STAFF_B,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
