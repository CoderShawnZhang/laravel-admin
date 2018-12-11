<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/30
 * Time: 下午3:01
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class TaskRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'taskrepository';
    }
}