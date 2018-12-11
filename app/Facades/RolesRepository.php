<?php
/**
 * 角色门面操作类
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class RolesRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'rolesrepository';
    }
}