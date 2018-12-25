<?php
/**
 * 菜单html设置
 */

namespace App\FixedWrite\Html;


use Illuminate\Support\Facades\Route;

class MenuHtml
{
    public static function makeBreadcrumbs(Array $array)
    {
        $array = two_dimensional_array_sort($array, 'sort', SORT_ASC);
        $breadcrumbs = '<ol class="breadcrumb">';
        foreach ($array as $key => $value) {
            if(count($array) == $key + 1){
                $breadcrumbs .= '<li class="active">';
            } else {
                $breadcrumbs .= '<li>';
            }

            if($value['route']){
                if(Route::has($value['route'])){
                    $breadcrumbs .= '<a href="' . route($value['route']) . '">';
                } else {
                    $breadcrumbs .= '<a href="#">';
                }
            } else {
                $breadcrumbs .= '<a href="#">';
            }

            if($value['icon']){
                $breadcrumbs .= '<i class="fa ' . trans($value['icon']) . '"></i> ';
            }
            $breadcrumbs .= trans($value['name']);
            $breadcrumbs .= '</a>';
            $breadcrumbs .= '</li>';
        }
        $breadcrumbs .= '</ol>';
        return $breadcrumbs;
    }

    /**
     * @param $trees
     * @param $active
     * @return string
     */
    public static function makeSidebar($trees,$active)
    {
        /* 生成左侧栏 HTML */
        $sidebar = '<ul class="sidebar-menu tree" data-widget="tree">';
        $sidebar .= self::makeSidebarLi($trees, $active);
        $sidebar .= '</ul>';
        return $sidebar;
    }

    /**
     * 菜单列表
     * @param $menus
     * @param $active
     * @return string
     */
    private static function makeSidebarLi($menus,$active)
    {
        $sidebar = '';
        foreach($menus as $key => $val){
            if(array_key_exists('child',$val)){
                if(in_array($val['route'],$active)){
                    $sidebar .= '<li class="treeview active">';
                } else {
                    $sidebar .= '<li class="treeview">';
                }
                $sidebar .= '<a href="#">';
                $sidebar .= '<i class="'.$val['icon'].'"></i>';
                $sidebar .= '<span class="pulll-right-container">';
                $sidebar .= $val['name'];
                $sidebar .= '</span>';
                $sidebar .= '</a>';
                $sidebar .= '<ul class="treeview-menu" style="padding-left: 20px;">';
                $sidebar .= self::makeSidebarLi($val['child'],$active);
                $sidebar .= '</ul>';
                $sidebar .= '</li>';
            } else {
                if(in_array($val['route'],$active)){
                    $sidebar .= '<li class="active">';
                } else {
                    $sidebar .= '<li>';
                }
                if(Route::has($val['route'])){
                    $sidebar .= '<a href="'.route($val['route']).'">';
                } else {
                    $sidebar .= '<a href="#">';
                }
                $sidebar .= '<i class="'.$val['icon'].'"></i>';
                $sidebar .= '<span>'.$val['name'].'</span>';
                $sidebar .= '</a>';
                $sidebar .= '</li>';
            }
        }
        return $sidebar;
    }
}