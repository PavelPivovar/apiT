<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//use App\Model\Task;

class Task extends Model
{
    protected $fillable = ['title', 'body'];

    public function reviews(){
        return $this->hasMany(Task::class);
    }
}
