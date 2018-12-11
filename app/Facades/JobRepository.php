<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/1
 * Time: 下午4:59
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class JobRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'jobrepository';
    }
}