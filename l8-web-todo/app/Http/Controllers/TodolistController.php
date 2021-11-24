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

    public function show(Todolist $todolist)
    {
//        dd($todolist);
        $tasks = $todolist->tasks()->get();
        return view('show', compact('tasks', 'todolist'));
    }

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
//        ddd($request->path());
        $request->validate([
            'title' => 'required|string|max:255',
            'todolist_id'=> 'required'
        ]);

            Task::create([
                'task'=>$request->title,
                'todolist_id'=>$request->path()
            ]);

//        Task::create([
//            'task'=>'new task',
//            'todolist_id'=>6
//            ]);

        return back()->with('success', 'Congrats! You got some work to do!');
    }

    public function update(Request $request, Todolist $todolist)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todolist $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back()->with('success', 'Well Done! You got one less work');
    }

    public function remove(Task $task)
    {
       $task->delete();
        return back();
    }
}
