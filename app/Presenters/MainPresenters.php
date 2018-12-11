<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/19
 * Time: 下午8:54
 */

namespace App\Presenters;


use App\FixedWrite\Html\MenuHtml;

class MainPresenters extends BasePresenters
{
    public function renderBreadcrumbs($menus,$route)
    {
        $array = self::buildBreadcrumbsArray($menus,$route);
        return MenuHtml::makeBreadcrumbs($array);
    }

    /**
     * 生成面包屑数组
     *
     * @param $menus
     * @param string $route
     * @param int $parent_id
     * @return array
     */
    protected static function buildBreadcrumbsArray($menus,$route='',$parent_id=0)
    {
        $breadcrumbs = [];
        foreach($menus as $key => $val){
            if($route){
                if($val['route'] == $route){
                    $breadcrumbs[] = $val;
                    $breadcrumbs = array_merge($breadcrumbs,
                        self::buildBreadcrumbsArray($menus,'',$val['parent_id']));
                }
            } else {
                if($val['id'] == $parent_id){
                    $breadcrumbs[] = $val;
                    $breadcrumbs = array_merge($breadcrumbs,
                        self::buildBreadcrumbsArray($menus,'',$val['parent_id']));
                }
            }
        }
        return $breadcrumbs;
    }

    /**
     * 生成左侧导航sidebar
     * @param $menus
     * @param $route
     * @return string
     */
    public function renderSidebar($menus,$route)
    {
        $trees = list_to_tree($menus);
        $array = self::buildBreadcrumbsArray($menus,$route);
        $active = array_map(function($value){
            return $value['route'];
        },$array);
        //生成sidebar
        return MenuHtml::makeSidebar($trees,$active);
    }
}