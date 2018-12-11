<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = ['name','display_name','description','menu_id'];//fillable为白名单，表示该字段可被批量赋值；


    protected $table = 'permissions';

    public function menu()
    {
        return $this->hasOne(Menu::class,'id','menu_id');
    }
}
