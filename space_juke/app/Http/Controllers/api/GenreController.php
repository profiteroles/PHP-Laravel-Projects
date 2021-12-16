<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Resources\Genre as GenreResource;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Genre::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genre = Genre::create(
            $request->validate([
                'name' => 'required|max:255',
                'parent' => 'max:255',
                'icon' => 'required|max:255',
                'extra' => 'max:255',
            ])
        );

        $response = [
            'message'=> 'Genre: '.$genre->name.' is created.',
            'genre'=>$genre
        ];

        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return $genre;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $genre->update(
            $request->validate([
                'name' => 'required|max:255',
                'parent' => 'max:255',
                'icon' => 'required|max:255',
                'extra' => 'max:255',
            ])
        );

        $response = [
            'message'=> 'Genre: '.$genre->name.' is updated.',
            'genre'=>$genre
        ];

        return response($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return response(['message'=>'Genre: '. $genre->name.'Successfully Deleted!'],200);
    }
}
