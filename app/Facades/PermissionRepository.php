<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/25
 * Time: 下午1:58
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class PermissionRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'permissionrepository';
    }
}