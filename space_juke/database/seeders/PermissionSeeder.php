<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //Astronauts
            'edit-profile', 'add-playlist','show-playlist', 'edit-playlist','delete-playlist',
            'add-track','edit-track','delete-track', 'show-track', 'play-track',
            //Managers
            'user-list', 'user-create', 'user-edit', 'user-delete','genre-create',
            'genre-edit','genre-delete',
            //Admin
            'role-list', 'role-create', 'role-edit', 'role-delete','playlist-all',
            'permission-list', 'permission-create', 'permission-edit', 'permission-delete'
        ];

        foreach ($data as $seed) {
            Permission::create(['name'=>$seed]);
        }
    }
}
