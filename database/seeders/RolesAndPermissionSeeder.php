<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create(["name" => "admin"]);
        $userRole = Role::create(["name" => "user"]);

        // Permissions for categories
        $categoryCreatePermission = Permission::create(["name" => "create categories"]);
        $categoryReadPermission = Permission::create(["name" => "read categories"]);
        $categoryUpdatePermission = Permission::create(["name" => "update categories"]);
        $categoryDeletePermission = Permission::create(["name" => "delete categories"]);

        // Permissions for posts
        $postCreatePermission = Permission::create(["name" => "create posts"]);
        $postReadPermission = Permission::create(["name" => "read posts"]);
        $postUpdatePermission = Permission::create(["name" => "update posts"]);
        $postDeletePermission = Permission::create(["name" => "delete posts"]);

        // Permissions for users
        $userCreatePermission = Permission::create(["name" => "create users"]);
        $userReadPermission = Permission::create(["name" => "read users"]);
        $userUpdatePermission = Permission::create(["name" => "update users"]);
        $userDeletePermission = Permission::create(["name" => "delete users"]);

        // Assign permissions to roles
        $adminRole->syncPermissions([
            $categoryCreatePermission,
            $categoryReadPermission,
            $categoryUpdatePermission,
            $categoryDeletePermission,
            $postCreatePermission,
            $postReadPermission,
            $postUpdatePermission,
            $postDeletePermission,
            $userCreatePermission,
            $userReadPermission,
            $userUpdatePermission,
            $userDeletePermission,
        ]);

        $userRole->syncPermissions([
            $categoryReadPermission,
            $postReadPermission,
            $userReadPermission,
]);
    }
}
