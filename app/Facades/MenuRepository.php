<?php
/**
 * 注册菜单门面
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MenuRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'menurepository';
    }
}