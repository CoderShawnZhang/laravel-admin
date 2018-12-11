<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/27
 * Time: 上午11:22
 */

namespace App\Http\ViewComposers;


use App\Presenters\PermissionPresenter;
use Illuminate\View\View;

class SkinPermissionComposer
{
    public function compose(View $view)
    {
        $permissionPresenter = new PermissionPresenter();
        $tableCompose = $permissionPresenter->getTableSetting();
        $toolsCompose = $permissionPresenter->toolsButton();
        $detailCompose = $permissionPresenter->detail();
        return $view->with(compact('tableCompose','toolsCompose','detailCompose'));
    }
}