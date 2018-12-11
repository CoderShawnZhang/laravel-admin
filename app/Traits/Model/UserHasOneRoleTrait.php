<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/24
 * Time: 上午1:54
 */

namespace App\Traits\Model;


use App\Models\RoleUser;

trait UserHasOneRoleTrait
{
    public function role()
    {
        return $this->hasOne(RoleUser::class,'user_id','id');
    }
}