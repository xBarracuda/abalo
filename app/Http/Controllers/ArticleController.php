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
    public function show(Request $request, string $id = NULL)
    {
        if ($id)
        {
            $a = Article::query()->select(['ab_article.id','ab_article.ab_name','ab_article.ab_price','ab_article.ab_description','ab_article.ab_creator_id','ab_article.ab_createdate'])
                                 ->join('ab_article_has_articlecategory','ab_article.id', '=','ab_article_has_articlecategory.ab_article_id')
                                 ->join('ab_articlecategory','ab_article_has_articlecategory.ab_articlecategory_id','=','ab_articlecategory.id')
                                 ->where('ab_articlecategory.id','=',$id)
                                 ->get();

            return view('articles',[
                'articles' => $a,
                'allArticles' => NULL
            ]);
        }
        if (!$request->input('search'))
        {
            $allarticles = Article::all();
            return view('articles',['articles' => NULL, 'allArticles' => $allarticles]);
        }
        $search = strtolower($request->input('search'));
        $articles = Article::query()->whereRaw('LOWER(ab_name) LIKE ?', ['%'.$search.'%'])->get();
        return view('articles',[
            'articles' => $articles,
            'allArticles' => NULL
        ]);
    }

    public function withID(Request $request, string $id)
    {
        dd($id);
    }
}
