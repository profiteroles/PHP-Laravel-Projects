<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedList = [
            [
                'id' => 1,
                'title' => 'Welcome to your todolist!',
                'priority'=>true
            ], [
                'id' => 2,
                'title' => "Erol's To Do List",
            ], [
                'id' => 3,
                'title' => 'Adrian\'s List',

            ]
        ];

        foreach ($seedList as $seed){
            \App\Models\Todolist::create($seed);
        }
    }
}
