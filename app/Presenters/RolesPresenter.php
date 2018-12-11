<?php
/**
 * 角色
 */

namespace App\Presenters;


class RolesPresenter extends BasePresenters
{
    public function getTableSetting()
    {
        $skin = config('admin.adminSkin');
        return [
            'options' => [
                'edit'=>[
                    'title' => '编辑',
                    'route' => 'admin/menu/edit',
                    'class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit'),
                ],
                'delete'=>[
                    'title' => '删除',
                    'route' => 'admin/role/destroy',
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
            '<a href="'.route('admin.role.create').'"><button type="button" class="btn btn-block btn-lg btn-flat bg-'.config('adminSkin.'.$skin.'.tools_btn_new').'">新增角色</button></a>'
        ];
    }

    public function detail()
    {
        $skin = config('admin.adminSkin');
        return [
            'add' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')],
            'show' => ['class' => 'btn btn-block bg-'.config('adminSkin.'.$skin.'.btn_show')],
            'confirm' => ['class' => 'btn btn-block btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')],
            'setHasRole' => ['class' => 'btn btn-flat btn-block bg-'.config('adminSkin.'.$skin.'.btn_show')],
            'setPermission' => ['class' => 'btn btn-flat btn-block bg-'.config('adminSkin.'.$skin.'.btn_show')],
            'hasPermission' => [
                'checkbox' => config('adminSkin.'.$skin.'.checkbox'),
                'timeLabel' => 'bg-'.config('adminSkin.'.$skin.'.timeLabel'),
                'timeLabel_icon' => 'bg-'.config('adminSkin.'.$skin.'.timeLabel_icon'),
            ]
        ];
    }

    public function uploadImg()
    {
        $skin = config('admin.adminSkin');
        return [
            'uploadPath' => config('admin.uploadImage.base_path').'users',
            'imageName'  => config('admin.uploadImage.name'),
            'uploadButton' => ['class' => 'btn btn-flat btn-block bg-'.config('adminSkin.'.$skin.'.btn_new')],
        ];
    }
}