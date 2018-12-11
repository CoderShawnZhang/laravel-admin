<?php
namespace App\Presenters;
use App\Constants\CacheConstant;
use App\Facades\MenuRepository;

/**
 *
 */

class MenuPresenter extends BasePresenters
{
    public function getTableSetting()
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
              '<a href="'.route('admin.menu.create').'"><button type="button" class="btn btn-block btn-lg btn-flat bg-'.config('adminSkin.'.$skin.'.tools_btn_new').'">新增菜单</button></a>',
              '<a href="'.route('admin.menu.clearCache').'"><button type="button" class="btn btn-block btn-lg btn-fla bg-'.config('adminSkin.'.$skin.'.tools_clear_cache').'">清除缓存</button></a>'
        ];
    }

    public function searchControl()
    {
        return [
            'action' => route('admin.menu.search'),
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

    public function detailView()
    {
        $skin = config('admin.adminSkin');
        return [
            'add' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')],
            'update' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit')]
        ];
    }
}