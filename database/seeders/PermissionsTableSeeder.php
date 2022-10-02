<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_access',
            ],
            [
                'id'    => 2,
                'title' => 'titles_access',
            ],
            [
                'id'    => 3,
                'title' => 'search_access',
            ],
            [
                'id'    => 4,
                'title' => 'themes_access',
            ],
            [
                'id'    => 5,
                'title' => 'research_access',
            ]
        ];

        Permission::insert($permissions);
    }
}
