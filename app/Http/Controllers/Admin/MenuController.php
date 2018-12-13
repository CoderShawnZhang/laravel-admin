<?php

namespace App\Http\Controllers\Admin;

use App\Constants\CacheConstant;
use App\Facades\MenuRepository;
use App\Http\Requests\Form\MenuCreateForm;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function list(Application $app)
    {
        $list = MenuRepository::getAllMenu();
        return view('admin.menu.list',compact('list'));
    }

    public function create()
    {
        $menus = MenuRepository::getAllMenu();
        $menuTree = create_select_level_tree($menus->toArray());
        return view('admin.menu.create',compact('menuTree'));
    }

    /**
     * 提交新增菜单
     *
     * @param MenuCreateForm $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(MenuCreateForm $request)
    {
        try {
            $input = $request->all();
            MenuRepository::create($input);
            return $this->successRouteTo('admin.menu.list','新增菜单成功！');
        } catch (\Exception $e) {
            return $this->errorBackTo($e->getMessage());
        }
    }

    public function edit($menu_id)
    {
        $menus = MenuRepository::getAllMenu();
        $menuTree = create_select_level_tree($menus->toArray());
        $menuData = MenuRepository::findOne(['id'=>$menu_id]);
        return view('admin.menu.edit',compact('menuData','menuTree'));
    }

    public function update(Request $request,$menu_id)
    {
        $data = $request->except(['_token', '_method']);
        MenuRepository::updateById($menu_id, $data);
        return $this->successRouteTo('admin.menu.list', '更新菜单成功！');
    }

    public function destroy($menu_id)
    {
        MenuRepository::destroy($menu_id);
        MenuRepository::clearCache(CacheConstant::ALL_MENUS_CACHE);
        return $this->successRouteTo('admin.menu.list','删除菜单成功！');
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $list =  MenuRepository::likeName('name','like',$name);
        return view('admin.menu.list',compact('list'));
    }

    public function clearCache(){
        MenuRepository::clearCache();
        return $this->successRouteTo('admin.menu.list','缓存清除成功！');
    }
}
