<?php
/**
 * 队列
 */

namespace App\Presenters;


use App\Facades\JobRepository;

class JobPresenters extends BasePresenters
{
    public function detailView()
    {
        $skin = config('admin.adminSkin');
        return [
            'open' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_new')],
            'close' => ['class' => 'btn btn-flat bg-'.config('adminSkin.'.$skin.'.btn_edit')]
        ];
    }
}