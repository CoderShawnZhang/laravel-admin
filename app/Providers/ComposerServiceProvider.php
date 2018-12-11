<?php

namespace App\Providers;

use App\ViewComposers\AppComposer;
use function foo\func;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       // 使用基于类方法的 composers...
        View::composer(['admin.layouts.header','admin.user.profile','admin.layouts.sidehead'],'App\Http\ViewComposers\UserInfoComposer');
        View::composer(['admin.layouts.app'],'App\Http\ViewComposers\AppComposer');
        View::composer(['admin.menu.list','admin.menu.edit','admin.menu.create'],'App\Http\viewComposers\SkinMenuComposer');
        View::composer(['admin.user.list','admin.user.create','admin.user.edit'],'App\Http\viewComposers\SkinUserComposer');
        View::composer(['admin.role.list','admin.role.detail','admin.role.create'],'App\Http\viewComposers\SkinRoleComposer');
        View::composer(['admin.permission.list','admin.permission.create'],'App\Http\viewComposers\SkinPermissionComposer');
        View::composer(['admin.task.list','admin.task.create'],'App\Http\viewComposers\SkinTaskComposer');
        View::composer(['admin.job.list'],'App\Http\ViewComposers\SkinJobComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
