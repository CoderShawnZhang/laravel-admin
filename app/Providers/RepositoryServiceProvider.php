<?php

namespace App\Providers;

use App\Repository\JobRepository;
use App\Repository\MenuRepository;
use App\Repository\PermissionRepository;
use App\Repository\RolesRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $repositoryConfig = realpath(basePath().'/config/repository.php');
        $this->mergeConfigFrom($repositoryConfig,'repository');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //注册菜单模型服务类
        $this->registerMenuRepository();
        //注册用户模型服务类
        $this->registerUserRepository();
        //注册角色模型服务类
        $this->registerRolesRepository();
        //注册权限模型服务类
        $this->registerPermissionRepository();
        //注册定时任务模型服务类
        $this->registerTaskRepository();
        //注册队列模型服务类
        $this->registerJobRepository();
    }

    private function registerMenuRepository()
    {
        $this->app->singleton('menurepository',function($app){
            $model = config('repository.models.menu');
            $menu = new $model;
            $validator = $app['validator'];
            return new MenuRepository($menu,$validator);
        });
    }

    private function registerUserRepository()
    {
        $this->app->singleton('userrepository',function($app){
            $model = config('repository.models.user');
            $user = new $model;
            $validator = $app['validator'];
            return new UserRepository($user,$validator);
        });
    }

    private function registerRolesRepository()
    {

        $this->app->singleton('rolesrepository',function($app){
            $model = config('repository.models.role');
            $roles = new $model;
            $validator = $app['validator'];
            return new RolesRepository($roles,$validator);
        });
    }

    private function registerPermissionRepository()
    {
        $this->app->singleton('permissionrepository',function($app){
            $model = config('repository.models.permission');
            $permission = new $model;
            $validator = $app['validator'];
            return new PermissionRepository($permission,$validator);
        });
    }

    private function registerTaskRepository()
    {
        $this->app->singleton('taskrepository',function($app){
            $model = config('repository.models.task');
            $task = new $model;
            $validator = $app['validator'];
            return new TaskRepository($task,$validator);
        });
    }

    private function registerJobRepository()
    {
        $this->app->singleton('jobrepository',function ($app){
            $model = config('repository.models.job');
            $job = new $model;
            $validator = $app['validator'];
            return new JobRepository($job,$validator);
        });
    }
}
