<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));


        

        $professor_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_';
        });

        Role::findOrFail(2)->permissions()->sync($professor_permissions->pluck('id'));





        $student_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_'
            && substr($permission->title, 0, 7) != 'titles_';

        });



        Role::findOrFail(3)->permissions()->sync($student_permissions);
    }
}
