<?php
/**
 * 操作菜单列表数组
 */

namespace App\Repository;

use App\Constants\CacheConstant;
use Illuminate\Support\Facades\Cache;

class MenuRepository extends BaseRepository
{
    public function model()
    {
        return $this->model;
    }

    /**
     * 显示所有菜单
     * @return mixed
     */
    public function getAllMenu()
    {
        $menus = Cache::get(CacheConstant::ALL_MENUS_CACHE);
        if(empty($menus)){
            $menus = $this->findAll([],'sort');
            Cache::forever(CacheConstant::ALL_MENUS_CACHE,$menus);
        }
        return $menus;
    }

    public function listPage($condition = [],$page = 10)
    {
        return $this->page($condition,$page);
    }

    /**
     * 获取显示的菜单列表
     */
    public function getDisplayMenu()
    {
        $menus = Cache::get(CacheConstant::ALL_DISPLAY_MENUS_CACHE);
        if(empty($menus)){
            $menus = $this->model->state()->orderBy('id','asc')->get()->toArray();
            Cache::forever(CacheConstant::ALL_DISPLAY_MENUS_CACHE,$menus);
        }
        return $menus;
    }

    //获取所有二级菜单
    public function getSecondLevel()
    {
        $menu = Cache::get(CacheConstant::SECOND_LEVEL_CACHE);
        if(empty($menu)){
            $menu = $this->model::whereNotIn('parent_id',[0])->get();
            Cache::forever(CacheConstant::SECOND_LEVEL_CACHE,$menu);
        }
        return $menu;
    }

    public function get_menu_node_tree(){
        $data = $this->getAllMenu();
        $menus_node_tree = Cache::get(CacheConstant::CREATE_MENU_NODE_TREE);
        if(empty($menus_node_tree)) {
            $menus_node_tree =  $this->create_menu_node_tree($data);
            Cache::forever(CacheConstant::CREATE_MENU_NODE_TREE,$menus_node_tree);
        }
        return $menus_node_tree;
    }

    private function create_menu_node_tree($data,$parent_id = 0, $name = 'childs')
    {
        $tree = [];
        foreach ($data as $item) {
            if($item['parent_id'] == $parent_id){
                $item[$name] = self::create_menu_node_tree($data,$item['id']);
                $tree[] = $item;
            }
        }
        return $tree;
    }


    /**
     * 清除缓存
     */
    public function clearCache($cacheKey = ''){
        if(!empty($cacheKey)){
            Cache::forget($cacheKey);
        }else {
            Cache::forget(CacheConstant::ALL_DISPLAY_MENUS_CACHE);
            Cache::forget(CacheConstant::ALL_MENUS_CACHE);
            Cache::forget(CacheConstant::SECOND_LEVEL_CACHE);
            Cache::forget(CacheConstant::CREATE_MENU_NODE_TREE);
        }
    }
}