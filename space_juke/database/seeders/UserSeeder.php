<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'id' => 1,
            'name' => 'Ad Ministrator',
            'email' => 'admin@example.com',
            'image' => 'https://i.pravatar.cc/300?img=66',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'created_at' => now(),
        ]);
        $adminRole = Role::findByName('admin');
        $permissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($permissions);
        $adminUser->assignRole($adminRole);

        $manegerUser = User::create([
            'id' => 2,
            'name' => 'Erol A\'NIL',
            'email' => 'erollooper@gmail.com',
            'image' => 'https://i.pravatar.cc/300?img=2',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'created_at' => now(),
        ]);
        $managerRole = Role::findByName('manager');
        $managerPerList = [
            'edit-profile', 'add-playlist', 'show-playlist', 'edit-playlist', 'delete-playlist',
            'add-track', 'edit-track', 'delete-track', 'show-track', 'play-track',
            'user-list', 'user-create', 'user-edit', 'user-delete', 'genre-create',
            'genre-edit', 'genre-delete',
        ];

        $managerPer = Permission::all()->whereIn('name', $managerPerList)->pluck('id', 'id');
        $managerRole->syncPermissions($managerPer);
        $manegerUser->assignRole($managerRole);


        $seedUsers = [
            [
                'id' => 3,
                'name' => 'Adrian Gould',
                'email' => 'adrian.gould@example.com',
                'image' => 'https://i.pravatar.cc/300?img=15',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ], [
                'id' => 4,
                'name' => 'Eileen Dover',
                'email' => 'eileen.dover@example.com',
                'image' => 'https://i.pravatar.cc/300?img=22',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ], [
                'id' => 5,
                'name' => "Jacques d'Carre",
                'email' => 'jacques.dcarre@example.com',
                'image' => 'https://i.pravatar.cc/300?img=50',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ], [
                'id' => 6,
                'name' => 'Russell Leaves',
                'email' => 'russell.leaves@example.com',
                'image' => 'https://i.pravatar.cc/300?img=65',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ], [
                'id' => 7,
                'name' => 'Ivana Vinn',
                'email' => 'ivana.vinn@example.com',
                'image' => 'https://i.pravatar.cc/300?img=64',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ], [
                'id' => 8,
                'name' => 'Win Doh',
                'email' => 'win.doh@example.com',
                'image' => 'https://i.pravatar.cc/300?img=6',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
        ];

        $role = Role::findByName('astronaut');
        $userPermissionList = [
            'edit-profile', 'add-playlist', 'show-playlist', 'edit-playlist', 'delete-playlist',
            'add-track', 'edit-track', 'delete-track', 'show-track', 'play-track',
        ];
        $permissions = Permission::all()->whereIn('name', $userPermissionList)->pluck('id', 'id');
        $role->syncPermissions($permissions);

        foreach ($seedUsers as $seed) {
            $user = User::create($seed);
            $user->assignRole($role);
        }
    }
}
