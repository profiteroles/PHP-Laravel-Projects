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
                'task' => '3rd Task',
                'priority'=> true,
                'todolist_id'=>1
            ],
            [
                'task' => '4th Task',
                'todolist_id'=>1
            ],
            [
                'task' => 'First Task',
                'todolist_id'=>1
            ],
            [
                'task' => 'Second Task',
                'todolist_id'=>2
            ],
            [
                'task' => 'First 5th Task',
                'priority'=> true,
                'todolist_id'=>2
            ],
            [
                'task' => 'Second 6th Task',
                'todolist_id'=>2
            ],
            [
                'task' => 'First 5th Task',
                'priority'=> true,
                'todolist_id'=>3
            ],
            [
                'task' => 'Second 6th Task',
                'todolist_id'=>3
            ],
            [
                'task' => 'Second 6th Task',
                'todolist_id'=>3
            ],
        ];

        foreach ($taskSeeder as $seed){
            Task::create($seed);
        }
    }
}
