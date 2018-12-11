<?php

namespace App\Http\Controllers\Admin;

use App\Facades\MenuRepository;
use App\Facades\PermissionRepository;
use App\FixedWrite\Html\PermissionHtml;
use App\Http\Requests\Form\PermissionCreateForm;
use App\Presenters\MenuPresenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function list()
    {
        //获取首个菜单id
        $firstMenu = MenuRepository::findOne(['route' => 'admin.system.desktop']);
        //所有权限列表
        $permissionFirstMenuId = PermissionRepository::firstMenuId(['menu_id'=>$firstMenu['id']])['menu_id'];
        //所有菜单列表
        $allMenuCache = MenuRepository::getAllMenu();
        $menuList = MenuRepository::get_menu_node_tree($allMenuCache);
        return view('admin.permission.list',compact('permissionFirstMenuId','menuList'));
    }

    public function ajax(Request $request)
    {
        if($request->ajax()) {
            $menu_id = $request->input('menu_id');
            $permissionList = PermissionRepository::permissionList(['menu_id' => $menu_id]);
            $html = '';
            foreach ($permissionList as $key => $val) {
                $html .= PermissionHtml::permissionListTr($val);
            }
            echo json_encode(['success' => true, 'html' => $html]);
        }
    }

    public function create()
    {
        $secondLevelMenu = MenuRepository::getSecondLevel();
        return view('admin.permission.create',compact('secondLevelMenu'));
    }

    public function edit()
    {
        return view('admin.permission.edit');
    }

    public function store(Request $request)
    {
        try{
            $input = $request->all();
            PermissionRepository::create($input);
            return $this->successRouteTo('admin.permission.list','新增权限成功！');
        } catch (\Exception $e) {
            return $this->errorBackTo($e->getMessage());
        }
    }

    public function update(PermissionCreateForm $request,$permission_id)
    {
        try{
            $data = $request->except(['_tokens','_method']);
            PermissionRepository::updateById($permission_id,$data);
            return $this->successRouteTo('admin.permission.list','更新权限成功！');
        } catch (\Exception $e) {
            return $this->errorBackTo($e->getMessage());
        }
    }

    /**
     * 设置角色权限
     */
    public function setRolesPermission()
    {
        dd(123);
    }
}
