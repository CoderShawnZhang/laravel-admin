<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/20
 * Time: 下午6:09
 */

namespace App\Repository;


class UserRepository extends BaseRepository
{
    public function getUserAll()
    {
        return $this->model::all();
    }

    public function getOnLine()
    {
        return $this->findAll(['state'=>1]);
    }
}