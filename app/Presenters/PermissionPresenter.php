<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/25
 * Time: 下午4:08
 */

namespace App\Presenters;


class PermissionPresenter extends BasePresenters
{
    public static function getTableSetting()
    {
        $skin = config('admin.adminSkin');
        return [
            'tableHeader' => [
                'columns'=>[
                    'id' => '编号',
                    'name' => '名称',
                    'route' => '路由',
                    'state' => '是否显示',
                    'option' => '操作',
                ],
                'style' => 'font-size:18px;',
            ],
            'options' => [
                'edit'=>[
                    'title' => '编辑',
                    'route' => 'admin/menu/edit',
                    'class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit'),
                ],
                'delete'=>[
                    'title' => '删除',
                    'route' => 'admin/menu/destroy',
                    'class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_delete'),
                ]
            ]
        ];
    }

    /**
     * 操作按钮
     */
    public function toolsButton()
    {
        $skin = config('admin.adminSkin');
        return [
            '<a href="'.route('admin.menu.create').'"><button type="button" class="btn btn-block btn-lg btn-flat bg-'.config('adminSkin.'.$skin.'.tools_btn_new').'">新增权限</button></a>',
            '<a href="'.route('admin.menu.clearCache').'"><button type="button" class="btn btn-block btn-lg btn-flat bg-'.config('adminSkin.'.$skin.'.tools_clear_cache').'">清理缓存</button></a>'
        ];
    }

    public function detail()
    {
        $skin = config('admin.adminSkin');
        return [
            'count_label' => ['class' => 'label pull-right bg-'.config('adminSkin.'.$skin.'.countLabel')],
            'add' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')]
        ];
    }
}