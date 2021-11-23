<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Todolist extends Seeder
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
                'content' => 'Start adding new list'
            ], [
                'id' => 2,
                'title' => "Erol's To Do List",
                'content' => ''
            ], [
                'id' => 3,
                'title' => 'Adrian\'s List',
                'content' => ''
            ]
        ];

        foreach ($seedList as $seed){
            \App\Models\Todolist::create($seed);
        }
    }
}
