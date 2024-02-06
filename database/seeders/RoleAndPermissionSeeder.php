<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
       
        Permission::create(['name'=>'view user']);
        Permission::create(['name'=>'edit user']);
        Permission::create(['name'=>'add user']);
        Permission::create(['name'=>'delete user']);

    
        Permission::create(['name'=>'view category']);
        Permission::create(['name'=>'edit category']);
        Permission::create(['name'=>'add category']);
        Permission::create(['name'=>'delete category']);

        //create roles and give created permissions to each role

        $roleAdmin= Role::create(['name'=>'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        Role::create(['name'=>'vendor']);

        Role::create(['name'=>'user']);
    }
}
