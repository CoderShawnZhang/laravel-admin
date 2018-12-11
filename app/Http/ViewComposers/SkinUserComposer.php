<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/27
 * Time: 上午10:32
 */

namespace App\Http\ViewComposers;


use App\Presenters\UserPresenter;
use Illuminate\View\View;

class SkinUserComposer
{
    public function compose(View $view)
    {
        $userPresenter = new UserPresenter();
        $tableCompose = $userPresenter->getTableSetting();
        $toolsCompose = $userPresenter->toolsButton();
        $searchCompose = $userPresenter->searchControl();
        $detailCompose = $userPresenter->detail();
        $uploadImgCompose = $userPresenter->uploadImg();
        return $view->with(compact('tableCompose','toolsCompose','searchCompose','detailCompose','uploadImgCompose'));
    }
}