<?php
/**
 * Compose 共享模版
 */

namespace App\Http\ViewComposers;

use App\Presenters\MenuPresenter;
use Illuminate\View\View;

class SkinMenuComposer
{
    public function compose(View $view)
    {
        $menuPresenter = new MenuPresenter();
        $tableCompose = $menuPresenter->getTableSetting();
        $toolsCompose = $menuPresenter->toolsButton();
        $searchCompose = $menuPresenter->searchControl();
        $detailCompose = $menuPresenter->detailView();
        return $view->with(compact('tableCompose','toolsCompose','searchCompose','detailCompose'));
    }
}