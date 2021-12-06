<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Model;

class Task extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'tasks';

    protected $fillable =['task','todolist_id','priority'];

    public function todolist()
    {
        return $this->belongsTo(Todolist::class);
    }
}
