<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::paginate(6);
        return view('admin.genres.index', compact(['genres']))->with("i", (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('genre-create');
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('genre-create');
        $genre = Genre::create(
            $request->validate([
                'name' => 'required|max:255',
                'parent' => 'max:255',
                'icon' => 'required|max:255',
                'extra' => 'max:255',
            ])
        );

        return redirect(route('genres.index'))->with('success', 'New Genre: ' . $genre->name . ' is Added to List');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('admin.genres.show', compact(['genre']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        $this->authorize('genre-edit');
        return view('admin.genres.edit', compact(['genre']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $this->authorize('genre-edit');
        $request->validate([
            'name' => 'required|max:255',
            'parent' => 'max:255',
            'icon' => 'required|max:255',
            'extra' => 'max:255',
        ]);

        $genre->name = $request->name;
        $genre->parent = $request->parent;
        $genre->icon = $request->icon;
        $genre->extra = $request->extra;
        $genre->save();
        return redirect(route('genres.index'))->with('success', $genre->name.' Genre Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $this->authorize('genre-delete');
        $genre->delete();
        return redirect(route('genres.index'))->with('success', 'Genre Has Successfully Deleted!');
    }
}
