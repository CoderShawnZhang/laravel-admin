<?php

namespace App\Http\Controllers\Admin;

use App\Facades\MenuRepository;
use App\Facades\PermissionRepository;
use App\Facades\RolesRepository;
use App\Http\Requests\Form\RoleCreateForm;
use App\Presenters\MenuPresenter;
use App\Presenters\RolesPresenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function list()
    {
        $list = RolesRepository::getRoleList();
        return view('admin.role.list',compact('list'));
    }

    public function create()
    {
        //所有权限列表
        $permissionList = PermissionRepository::permissionList();
        //所有菜单列表
        $allMenuCache = MenuRepository::getAllMenu();
        $menuList = MenuRepository::get_menu_node_tree($allMenuCache);
        return view('admin.role.create',compact('permissionList','menuList'));
    }

    public function store(RoleCreateForm $request)
    {
        try{
            $input = $request->all();
            if(RolesRepository::create($input)){
                return $this->successRouteTo('admin.role.list','新增角色成功！');
            }
        } catch (\Exception $e) {
            return $this->errorBackTo($e->getMessage());
        }
    }

    //删除角色
    public function destroy($role_id)
    {
//        RolesRepository::destroy($role_id);
        $role = RolesRepository::findOne($role_id); // 获取给定权限

        // 正常删除
        $role->delete();

        // 强制删除
//        $role->users()->sync([]); // 删除关联数据
//        $role->perms()->sync([]); // 删除关联数据
//
//        $role->forceDelete(); // 不管透视表是否有级联删除都会生效
        return $this->successRouteTo('admin.role.list','删除角色成功！');
    }

    public function detail()
    {
        //所有权限列表
        $permissionList = PermissionRepository::permissionList();
        //所有菜单列表
        $allMenuCache = MenuRepository::getAllMenu();
        $menuList = MenuRepository::get_menu_node_tree($allMenuCache);
        return view('admin.role.detail',compact('permissionList','menuList'));
    }

    public function upload(Request $request)
    {
        if($request->ajax()){
            $file = $request->file(config('admin.uploadImage.form_input_name'));
            echo $this->uploadImage(new RolesPresenter(),$file);
        }else{
            return $this->errorBackTo('非AJAX请求异常！');
        }
    }
}
