<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['title','priority'];

    public function tasks(){
        return $this->hasMany(Task::class);
//        return $this->belongsTo(Task::class, 'todo_items','todolist_id','task_id');
    }
}
