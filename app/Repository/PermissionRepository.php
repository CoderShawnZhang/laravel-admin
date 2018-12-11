<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/25
 * Time: 下午1:54
 */

namespace App\Repository;


use Illuminate\Support\Facades\DB;

class PermissionRepository extends BaseRepository
{
    public function test()
    {
        return 2222;
    }

    public function permissionList($condition = [])
    {
        return $this->findAll($condition);
    }

    public function firstMenuId($condition = [])
    {
        $result =  $this->findOne($condition);
        return $result;
    }
}