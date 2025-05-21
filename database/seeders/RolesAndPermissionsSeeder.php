<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
       app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'participate in challenges', 'guard_name' => 'api']);
        Permission::create(['name' => 'view rankings', 'guard_name' => 'api']);
        Permission::create(['name' => 'manage challenges', 'guard_name' => 'api']);
        Permission::create(['name' => 'manage scores', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete users', 'guard_name' => 'api']);

        $userRole = Role::create(['name' => 'user', 'guard_name' => 'api']);
        $challangeUserRole = Role::create(['name' => 'challange_user', 'guard_name' => 'api']);
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'api']);

        $userRole->givePermissionTo([]);
        $challangeUserRole->givePermissionTo(['participate in challenges', 'view rankings']);
        $adminRole->givePermissionTo(['manage challenges', 'manage scores', 'delete users']);
    }
}
