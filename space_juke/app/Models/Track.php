<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function playlist(){
        return $this->hasMany(Playlist::class,'playlist_tracks','playlist_id','track_id' );
    }
}
