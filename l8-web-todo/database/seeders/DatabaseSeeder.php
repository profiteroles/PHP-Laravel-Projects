<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TodolistSeeder::class,
            TaskSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
