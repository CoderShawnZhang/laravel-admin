<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/30
 * Time: 下午2:19
 */

namespace App\Presenters;


class TaskPresenter extends BasePresenters
{
    /**
     * 操作按钮
     */
    public function toolsButton()
    {
        $skin = config('admin.adminSkin');
        return [
            '<a data-toggle="modal" data-target="#readme-modal"><button type="button" class="btn btn-block btn-lg btn-flat bg-'.config('adminSkin.'.$skin.'.tools_btn_new').'">操作说明</button></a>',
            '<a href="'.route('admin.task.clearCache').'"><button type="button" class="btn btn-block btn-lg btn-fla bg-'.config('adminSkin.'.$skin.'.tools_clear_cache').'">清除缓存</button></a>'
        ];
    }

    public function detailView()
    {
        $skin = config('admin.adminSkin');
        return [
            'open' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')],
            'close' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit')]
        ];
    }
}