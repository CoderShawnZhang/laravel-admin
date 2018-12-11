<?php
/**
 * 用户管理门面
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class UserRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'userrepository';
    }
}