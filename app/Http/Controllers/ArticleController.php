<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController
{
    public function show(Request $request)
    {
        if (!$request->input('search'))
        {
            return view('/articles',['articles' => NULL]);
        }
        $search = strtolower($request->input('search'));
        $articles = Article::query()->whereRaw('LOWER(ab_name) LIKE ?', ['%'.$search.'%'])->get();
        return view('/articles',['articles' => $articles]);
    }
}
