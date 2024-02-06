<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module_user= Module::where('module_name', 'user')->first();
        $module_user->givePermissionTo(['add user','view user','edit user','delete user']);

        $module_category=Module::where('module_name', 'category')->first();
        $module_category->givePermissionTo(['add category','view category','edit category','delete category']);
    }
}
