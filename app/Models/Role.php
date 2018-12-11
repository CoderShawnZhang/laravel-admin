<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name','display_name','avatar','description','state'];

    //Entrust 模型Role删除时，产生FatalErrorException错误——Class name must be a valid object or a string in HasRelationships.php (line 487)；

    //角色权限的改变会跟新相应的users表，role_user是框架自动生成带有约束的表，而我在Role模型中 并未添加users和role表之间的关系
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
