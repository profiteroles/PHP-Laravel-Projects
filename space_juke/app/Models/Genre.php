<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function tracks(){
        return $this->hasMany(Track::class);
    }
    public function playlist(){
        return $this->hasMany(Playlist::class);
    }
}
