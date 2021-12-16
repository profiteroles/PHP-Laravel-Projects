<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\PlaylistTracks;
use App\Models\Track;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()){
            $playlists = Playlist::where('public', 1)->paginate(6);
        } else{
            $playlists = Playlist::where('user_id',auth()->user()->id)->orWhere('public', 1)->paginate(6);
        }
        return view('admin.playlists.index', compact(['playlists']))->with("i", (\request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('add-playlist');
        return view('admin.playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('add-playlist');
        $playlist = Playlist::create(
            $request->validate([
                'name' => 'required|max:255',
                'user_id' => 'required|max:255',
                'public' => 'required',
            ])
        );
        return redirect(route('playlists.index'))->with('success', 'Playlist: ' . $playlist->name . ' Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        return view('admin.playlists.show', compact(['playlist']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        $this->authorize('edit-playlist');
        $tracks = Track::all();
        return view('admin.playlists.edit', compact(['playlist','tracks']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        $this->authorize('edit-playlist');
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $playlist->name = $request->name;
        $playlist->public = $request->public;

        $playlist->tracks()->attach($request->track_id);

        $playlist->save();

        return redirect(route('playlists.index'))->with('success', 'Playlist: ' . $playlist->name . '\'s Details is up to Date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        $this->authorize('delete-playlist');
        $playlist->tracks()->detach();
        $playlist->delete();
        return redirect(route('playlists.index'))->with('success', $playlist->name . ' Playlist is Successfully Deleted');
    }

    public function removeTrack(Playlist $playlist, Track $track)
    {
        $this->authorize('edit-playlist');
        $playlist->tracks()->detach($track);
        return back()->with('success', 'Track is Deleted From the Playlist');

    }
}
