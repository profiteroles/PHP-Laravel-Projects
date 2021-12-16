<?php

namespace App\Models;

use Database\Seeders\PlaylistSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tracks()
    {
        return $this->belongsToMany( Track::class, 'playlist_tracks','playlist_id','track_id' );
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    //todo:sort this favs out
    //favs belongs to user
    //so you may not neeed a migration table,
    //favs has many playlist
    public function favorites()
    {
        $this->belongsToMany(Favourite::class );
    }
}
