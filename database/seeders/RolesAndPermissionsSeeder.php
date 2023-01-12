<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'todo_actas_entrega', 'descripcion' => 'Gestión de las actas de entrega']);
        Permission::create(['name' => 'todo_actas_devolucion', 'descripcion' => 'Gestión de las actas de devolución']);

        // crear Role
        $role = Role::create(['name' => 'rol inventario', 'descripcion' => 'Rol Admistrador Inventarios']);
        $role->givePermissionTo('todo_actas_entrega');
        $role->givePermissionTo('todo_actas_devolucion');
    }
}
