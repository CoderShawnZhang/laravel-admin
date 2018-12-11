<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/29
 * Time: 下午9:01
 */

namespace App\Http\ViewComposers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserInfoComposer
{
    public function compose(View $view)
    {
        $userInfo = Auth::user();
        return $view->with(compact('userInfo'));
    }
}