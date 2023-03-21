<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Psr\Log\NullLogger;

class ArticleController extends BaseController
{
    public function show(Request $request)
    {
        if (!$request->input('search'))
        {
            $allarticles = Article::all();
            return view('/articles',['articles' => NULL, 'allArticles' => $allarticles]);
        }
        $search = strtolower($request->input('search'));
        $articles = Article::query()->whereRaw('LOWER(ab_name) LIKE ?', ['%'.$search.'%'])->get();
        return view('articles',[
            'articles' => $articles,
            'allArticles' => NULL
        ]);
    }
}
