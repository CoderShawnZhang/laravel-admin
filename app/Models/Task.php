<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','rate','runTimes','commands','description','runFile','state','tag'];//fillable为白名单，表示该字段可被批量赋值；

    protected $table = 'tasks';

    public $timestamps = false;
}
