<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/22
 * Time: 上午11:48
 */

namespace App\Repository;


class RolesRepository extends BaseRepository
{
    public function getRoleList($condition = [])
    {
        return $this->findAll($condition);
    }

    public function getRoleById($id)
    {
        return $this->model::where('id',$id)->first();
    }
}