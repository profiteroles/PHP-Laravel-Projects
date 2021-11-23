<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskSeeder =[
            [
                'id' => 1,
                'task' => '3rd Task',
                'priority'=> true,
                'todolist_id'=>1
            ],
            [
                'id' => 2,
                'task' => '4th Task',
                'todolist_id'=>1
            ],
            [
                'id' => 3,
                'task' => 'First Task',
                'todolist_id'=>1
            ],
            [
                'id' => 4,
                'task' => 'Second Task',
                'todolist_id'=>2
            ],
            [
                'id' => 5,
                'task' => 'First 5th Task',
                'priority'=> true,
                'todolist_id'=>2
            ],
            [
                'id' => 6,
                'task' => 'Second 6th Task',
                'todolist_id'=>2
            ],
            [
                'id' => 7,
                'task' => 'First 5th Task',
                'priority'=> true,
                'todolist_id'=>3
            ],
            [
                'id' => 8,
                'task' => 'Second 6th Task',
                'todolist_id'=>3
            ],
            [
                'id' => 9,
                'task' => 'Second 6th Task',
                'todolist_id'=>3
            ],

        ];

        foreach ($taskSeeder as $seed){
            Task::create($seed);
        }
    }
}
