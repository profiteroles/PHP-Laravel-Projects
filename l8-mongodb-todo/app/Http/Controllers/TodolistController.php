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


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list = Todolist::create($request->validate(['title' => 'required|string|max:128']));
        $list->priority = false;
        $list->save();

        return back()->with('success', 'Congrats! You got some work to do!');

    }


    public function update(Request $request, $id)
    {
        $todolist = Todolist::find($id);

        $todolist->priority = $request->priority == 'on' ? true : false;
        $todolist->save();
        return back()->with('success', ' The List has Been' . $request->priority == 'on' ? 'Unprioritised' : 'Prioritised');
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


    public function deleteAllList()
    {
        Todolist::destroy(Todolist::all());
        Task::destroy(Task::all());
        return back()->with('success', 'You\'ve Deleted All of Your List');
    }
}
