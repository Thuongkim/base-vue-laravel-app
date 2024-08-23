<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return $route->getName();
        });
        $permissionData = [];
        $ignoreRoutes = [
            'login',
            'logout',
            'me',
            'ignition',
            'sanctum',
            'l5-swagger',
        ];
        foreach ($routes as $route) {
            $routeInfo = explode('.', $route);
            if (count($routeInfo) > 1 && ! in_array($routeInfo[0], $ignoreRoutes)) {
                $permissionData[] = [
                    'name' => $route,
                    'controller' => $routeInfo[0],
                    'action' => $routeInfo[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('permissions')->insert($permissionData);
    }
}
