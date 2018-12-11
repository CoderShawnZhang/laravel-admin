<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/14
 * Time: 下午3:03
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }

    public function tasks()
    {
        return view('admin.index.tasks');
    }
}