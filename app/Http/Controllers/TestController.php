<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Presenters\MenuPresenter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $t = new MenuPresenter();

        dd(route('log-viewer::dashboard'));
    }

    public function index()
    {
        return view('index');
    }

    public function a()
    {
        return view('a');
    }

    public function b()
    {
        return view('b');
    }
}
