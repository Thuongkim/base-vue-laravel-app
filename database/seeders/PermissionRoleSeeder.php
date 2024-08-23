<?php

namespace Database\Seeders;

use App\Constants\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = DB::table('roles')->get();
        $permissions = DB::table('permissions')->get();
        $permissionRoleData = [];
        $readActions = [
            'index',
            'show',
        ];
        foreach ($roles as $role) {
            foreach ($permissions as $permission) {
                if ($role->name != Role::STAFF_B || in_array($permission->action, $readActions)) {
                    $permissionRoleData[] = [
                        'role_id' => $role->id,
                        'permission_id' => $permission->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }
        DB::table('permission_role')->truncate();
        DB::table('permission_role')->insert($permissionRoleData);
    }
}
