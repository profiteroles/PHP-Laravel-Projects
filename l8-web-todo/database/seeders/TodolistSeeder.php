<?php

namespace Database\Seeders;

use App\Models\Todolist;
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
                'priority' => true,
//                'tasks' => [1, 2, 3],
            ], [
                'id' => 2,
                'title' => "Erol's To Do List",
//                'tasks' => [4, 5, 6],
            ], [
                'id' => 3,
                'title' => 'Adrian\'s List',
                'priority' => true,
//                'tasks' => [7, 8, 9],
            ]
        ];

        foreach ($seedList as $seed) {
            Todolist::create($seed);
//            $newList = [
//                'id' => $seed['id'],
//                'title' => $seed['title'],
//                'priority' => $seed['priority'],
//            ];
//            $newTaskList = Todolist::create($newList);
//
//            $tasks = $seed['tasks'];
//            $newTaskList->tasks()->attach($tasks);
        }
    }
}
