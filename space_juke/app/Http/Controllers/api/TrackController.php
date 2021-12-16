<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrackStore;
use App\Http\Resources\Track as TrackResource;
use App\Http\Resources\TrackCollection;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TrackCollection(Track::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackStore $request)
    {
        $data = request()->validate([
            'artist' => 'required|max:255',
            'album' => 'required|max:255',
            'genre_id' => 'required',
            'name'=>'required|max:255',
            'length'=>'required',
            'year'=>'required'
        ]);


        return response(new TrackResource(Track::create($data)), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return new TrackResource($track);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrackStore $request, Track $track)
    {
        $track->update([
            'artist' => $request->artist,
            'album' => $request->album,
            'genre_id' => $request->genre_id,
            'name'=>$request->name,
            'length'=>$request->length,
            'year'=>$request->year,
        ]);

        return new TrackResource($track);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return response('Track: '. $track->name . ' Successfully Deleted!', 200);
    }
}
