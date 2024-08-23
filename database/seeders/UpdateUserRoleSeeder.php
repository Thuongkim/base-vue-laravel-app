<?php

namespace Database\Seeders;

use App\Constants\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = DB::table('roles')->where('name', Role::SUPER_ADMIN)->first();
        DB::table('users')->where('email', 'admin@gmail.com')->update([
            'role_id' => $adminRole->id,
        ]);
    }
}
