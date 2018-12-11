<?php
/**
 * 菜单模型
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name','route','parent_id','rules','icon','state','sort'];

    public function state()
    {
        return $this->where('parent_id', 0)->whereIn('state',[1]);
    }

    public function stateAll()
    {
        return $this->whereIn('state',[0,1]);
    }

    public function getPermission()
    {
        return $this->hasMany(Permission::class,'menu_id','id');
    }

}