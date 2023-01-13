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

        // create PERMISSIONS
        //INVENTARIOS
        Permission::create(['name' => 'config', 'descripcion' => 'Acceso a la Configuración']);
        Permission::create(['name' => 'todo_actas_entrega', 'descripcion' => 'Gestión de las actas de entrega']);
        Permission::create(['name' => 'todo_actas_devolucion', 'descripcion' => 'Gestión de las actas de devolución']);

        //crear Role Admistrador
        $roleAdmin = Role::create(['name' => 'admin', 'descripcion' => 'Rol Super Admistrador']);
        $roleAdmin->givePermissionTo('config');
        $roleAdmin->givePermissionTo('todo_actas_entrega');
        $roleAdmin->givePermissionTo('todo_actas_devolucion');

        // crear Role Inventario
        $role = Role::create(['name' => 'rol inventario', 'descripcion' => 'Rol Admistrador Inventarios']);
        $role->givePermissionTo('todo_actas_entrega');
        $role->givePermissionTo('todo_actas_devolucion');
    }
}
