<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/19
 * Time: 下午8:03
 */

namespace App\Http\ViewComposers;


use App\Facades\MenuRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view)
    {
        $checkBoxSkin = config('adminSkin.'.config('admin.adminSkin').'.checkbox');
        $route = Route::currentRouteName();
        $menus = MenuRepository::getAllMenu()->toArray();
        return $view->with(compact('menus','route','checkBoxSkin'));
    }
}