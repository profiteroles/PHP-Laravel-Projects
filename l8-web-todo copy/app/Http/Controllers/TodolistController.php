<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = Todolist::all();
        return view('index', compact('todolists'));
    }

//    public function show(Todolist $todolist)
//    {
//        $tasks = $todolist->tasks()->get();
//        return view('show', compact('tasks', 'todolist'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Todolist::create($request->validate([
            'title' => 'required|string|max:128',
        ]));

        return back()->with('success', 'Congrats! You got some work to do!');
    }

    public function addtask(Request $request)
    {
//        $request->validate(['title' => 'required|string|max:255']);
//
//       $task = Task::create([
//            'task' => $request->title,
//            'todolist_id' => $request->path()
//        ]);
//
//        return back()->with('success', 'Congrats! You got some work to do!');
    }

    public function update(Request $request, $id)
    {
        $todolist = Todolist::find($id);
        $todolist->priority = $request->priority == 'on' ? '1' : '0';
        $todolist->save();
        return back()->with('success', ' The List has Been' . $request->priority == 'on' ? 'Prioritised' : 'Unprioritised');
    }

    public function updateTask(Request $request, int $id)
    {
//        Why keeps coming back to here...
//        ddd($request);
//        $task = Task::find($id);
//        $task->priority = $request->priority == 'on' ? '1': '0';
//        $task->save();
//
//        return back()->with('success', ' Task has'. $request->priority == 'on' ? 'Prioritised': 'Unprioritised');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todolist $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todolist = Todolist::find($id);
        $todolist->delete();
        return back()->with('success', 'Well Done! You got one less List');
    }

    public function remove(Task $task)
    {
//        $task->delete();
//        return back()->with('success', 'Well Done! You got one less work');
    }

    public function deleteAllList()
    {
        Todolist::destroy(Todolist::all());
        Task::destroy(Task::all());
        return back()->with('success', 'You\'ve Deleted All of Your List');
    }

}
