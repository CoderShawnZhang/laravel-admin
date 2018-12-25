<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/27
 * Time: 上午11:07
 */

namespace App\Http\ViewComposers;


use App\Presenters\RolesPresenter;
use Illuminate\View\View;

class SkinRoleComposer
{
    public function compose(View $view)
    {
        $rolePresenters = new RolesPresenter();
        $tableCompose = $rolePresenters->getTableSetting();
        $toolsCompose = $rolePresenters->toolsButton();
        $searchCompose = $rolePresenters->searchControl();
        $detailCompose = $rolePresenters->detail();
        $uploadImgCompose = $rolePresenters->uploadImg();
        return $view->with(compact('tableCompose','toolsCompose','searchCompose','detailCompose','uploadImgCompose'));
    }
}