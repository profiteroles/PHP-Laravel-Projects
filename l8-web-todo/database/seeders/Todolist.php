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
                'content' => 'Start Typing'
            ], [
                'id' => 2,
                'title' => 'Hit the + button to add a new item.',
                'content' => ''
            ], [
                'id' => 3,
                'title' => '<-- Hit this to delete an item.',
                'content' => ''
            ]
        ];

        foreach ($seedList as $seed){
            \App\Models\Todolist::create($seed);
        }
    }
}
