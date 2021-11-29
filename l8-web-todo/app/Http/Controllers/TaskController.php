<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($id)
    {
        $todolist = Todolist::find($id);
        $tasks = $todolist->tasks()->get();
        return view('tasks.show', compact(['tasks','todolist']));
    }

    public function store(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255']);

        $task = Task::create([
            'task' => $request->title,
            'todolist_id' => $id
        ]);

        return back()->with('success', 'Congrats! You got some work to do!');
    }

    public function update(Request $request, $list_id,$id)
    {
        $task = Task::find($id);
        $task->priority = $request->priority == 'on' ? '1': '0';
        $task->save();

        return back()->with('success', ' Task has'. $request->priority == 'on' ? 'Prioritised': 'Unprioritised');
    }

    public function destroy($list_id,$id)
    {
        $task = Task::find($id);
        $task->delete();
        return back()->with('success', 'Well Done! You got one less work');
    }
    public function deleteAll($id)
    {
        $tasks = Task::where('todolist_id', $id)->get();
        Task::destroy($tasks);
        return back()->with('success', 'You\'ve Deleted All of Your Tasks');
    }
}
