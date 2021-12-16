<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::paginate(6);
        return view('admin.tracks.index',compact(['tracks']))->with("i", (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('add-track');
        return view('admin.tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('add-track');
        $data = request()->validate([
            'artist' => 'required|max:255',
            'album' => 'required|max:255',
            'genre_id' => 'required',
            'name'=>'required|max:255',
            'length'=>'required',
            'year'=>'required'
        ]);
        $track = Track::create($data);

        return redirect(route('tracks.index'))->with('success', 'New Track ID: '.$track->id.' Added to List');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('admin.tracks.show', compact(['track']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {

        $this->authorize('edit-track');
        $tracks = Track::all();
//        $pMissions = Role::all()->permissions;
        return view('admin.tracks.edit', compact(['track','tracks']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $this->authorize('edit-track');
        $request->validate([
            'artist' => 'required|max:255',
            'album' => 'required|max:255',
            'genre_id' => 'required',
            'name'=>'required|max:255',
            'length'=>'required',
            'year'=>'required',
        ]);

        $track->artist = $request->artist;
        $track->album = $request->album;
        $track->genre_id = $request->genre_id;
        $track->name = $request->name;
        $track->length = $request->length;
        $track->year = $request->year;
        $track->save();
        return redirect(route('tracks.index'))->with('success', $track->id.' Track Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $this->authorize('delete-track');
        $track->delete();
        return redirect(route('tracks.index'))->with('success', 'Track Has Successfully Deleted!');
    }
}
