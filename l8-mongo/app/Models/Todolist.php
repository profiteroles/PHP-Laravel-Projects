<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Model;

class Todolist extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'todolists';

    protected $fillable = ['title','priority'];

    public function tasks(){
//        return $this->embedsMany(Task::class, 'local_key');
        return $this->hasMany(Task::class);
    }
}
