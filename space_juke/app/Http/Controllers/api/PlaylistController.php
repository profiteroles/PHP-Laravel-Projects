<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaylistCollection;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PlaylistCollection(Playlist::paginate(10));
//        return Playlist::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Playlist::create(
            $request->validate([
                'name' => 'required|max:255',
                'user_id' => 'required|max:255',
                'public' => 'required',
                'tracks' => 'array'
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Playlist::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $playlist = Playlist::find($id);

        $playlist->update(
            $request->validate([
                'name' => 'required|max:255',
                'user_id' => 'required|max:255',
                'public' => 'required',
                'tracks' => 'array'
            ])
        );

        $response = [
            'message'=> 'Playlist: '.$playlist->name.' is updated.',
            'playlist'=> $playlist
        ];

        return response($response,201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);

        $playlist->delete();

        return "Playlist ". $playlist->name. 'is deleted';
    }
}
