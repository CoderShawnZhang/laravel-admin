<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/21
 * Time: 上午8:56
 */

namespace App\Presenters;


class UserPresenter extends BasePresenters
{
    public function getTableSetting()
    {
        $skin = config('admin.adminSkin');
        return [
            'tableHeader' => [
                'columns'=>[
                    'avatar' => '头像',
                    'name' => '用户名',
                    'role' => '角色',
                    'email' => '账号',
                    'created_at' => '创建时间',
                    'state' => '状态',
                    'option' => '操作',
                ],
                'style' => 'font-size:16px;',
            ],
            'options' => [
                'edit'=>[
                    'title' => '编辑',
                    'route' => 'admin/user/edit',
                    'class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit'),
                ],
                'delete'=>[
                    'title' => '删除',
                    'route' => 'admin/user/destroy',
                    'class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_delete'),
                ],
                'show'=>[
                    'title' => '查看',
                    'route' => 'admin/user/show',
                    'class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_show'),
                ]
            ]
        ];
    }

    public function toolsButton()
    {
        $skin = config('admin.adminSkin');
        return [
            '<a href="'.route('admin.user.create').'"><button type="button" class="btn btn-block btn-lg btn-flat bg-'.config('adminSkin.'.$skin.'.tools_btn_new').'">新增用户</button></a>',
        ];
    }

    public function searchControl()
    {
        return [
            'action' => route('admin.user.search'),
            'method' => 'post',
            'inputs'=>[
                [
                    'name' => 'name',
                    'type' => 'text',
                    'placeholder' => '查询'
                ]
            ]
        ];
    }

    public function detail()
    {
        $skin = config('admin.adminSkin');
        return [
            'add' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')],
            'update' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit')],
            'setRole' => ['class' => 'btn btn-block btn-flat bg-'.config('adminSkin.'.$skin.'.btn_setPermission')],
            'roleDetail' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit')]
        ];
    }

    public function uploadImg()
    {
        return [
            'uploadPath' => config('admin.uploadImage.base_path').'users',
            'imageName'  => config('admin.uploadImage.name'),
        ];
    }
}