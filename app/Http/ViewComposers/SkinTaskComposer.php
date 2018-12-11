<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/30
 * Time: 下午2:18
 */

namespace App\Http\ViewComposers;


use App\Presenters\TaskPresenter;
use Illuminate\View\View;

class SkinTaskComposer
{
    public function compose(View $view)
    {
        $rolePresenters = new TaskPresenter();
        $detailCompose = $rolePresenters->detailView();
        $toolsCompose = $rolePresenters->toolsButton();
        return $view->with(compact('detailCompose','toolsCompose'));
    }
}