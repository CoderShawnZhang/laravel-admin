<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::paginate(5);
        return view('articles.index',compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['intro'] = mb_substr($request->input('content'),0,64);
        $input['published_at'] = time();
        Article::create($input);
        return redirect('article/index');
    }

    public function show(Request $request)
    {
        $article_id = $request->input('article_id');

        $article = Article::where('id',$article_id)->first();

        return view('articles.show',compact('article'));
    }
}
