<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function list()
    {
        return view('admin.system.list');
    }

    /**
     * 锁屏
     */
    public function lock()
    {
        return view('admin.system.lock');
    }

    /*后台桌面*/
    public function desktop()
    {
        return view('admin.system.desktop');
    }

    public function word()
    {
        return view('admin.system.word');
    }

    public function env()
    {
        $envList = getEnvArray();
        // 或者
        $data = [
            'QUEUE_DRIVER' => 'redis',
        ];
        $x = modifyEnv($data);
        return view('admin.system.env',compact('envList'));
    }
}
