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
    public function list(Request $request)
    {
        //所有权限列表
        $permissionList = PermissionRepository::listPage([],10);
        //分页处理
        $page = isset($request['page'])?$request['page']:1;
        $permissionList = $permissionList->appends([
             'page'=>$page
         ]);

        return view('admin.permission.list',compact('permissionList'));
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
