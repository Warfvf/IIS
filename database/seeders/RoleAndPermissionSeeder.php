<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-bus']);
        Permission::create(['name' => 'edit-bus']);
        Permission::create(['name' => 'delete-bus']);

        Permission::create(['name' => 'create-stop']);
        Permission::create(['name' => 'edit-stop']);
        Permission::create(['name' => 'delete-stop']);

        Permission::create(['name' => 'create-route']);
        Permission::create(['name' => 'edit-route']);
        Permission::create(['name' => 'delete-route']);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $adminRole->givePermissionTo([
            'create-bus',
            'edit-bus',
            'delete-bus',
            'create-stop',
            'edit-stop',
            'delete-stop',
            'create-route',
            'edit-route',
            'delete-route',
        ]);

        $editorRole->givePermissionTo([
            'create-bus',
            'edit-bus',
            'delete-bus',
            'create-stop',
            'edit-stop',
            'delete-stop',
            'create-route',
            'edit-route',
            'delete-route',
        ]);
    }
}
