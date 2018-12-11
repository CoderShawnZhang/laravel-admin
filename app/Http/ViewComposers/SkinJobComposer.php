<?php
/**
 * Job公用模版
 */

namespace App\Http\ViewComposers;


use App\Presenters\JobPresenters;
use Illuminate\View\View;

class SkinJobComposer
{
    public function compose(View $view)
    {
        $jobPresenter = new JobPresenters();
        $detailCompose = $jobPresenter->detailView();
        return $view->with(compact('detailCompose'));
    }
}