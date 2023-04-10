<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Psr\Log\NullLogger;

class ArticleController extends BaseController
{
    public function show(Request $request, string $id = NULL)
    {
        if ($id) {
            $a = Article::query()
                ->select(['ab_article.id', 'ab_article.ab_name', 'ab_article.ab_price', 'ab_article.ab_description', 'ab_article.ab_creator_id', 'ab_article.ab_createdate'])
                ->join('ab_article_has_articlecategory', 'ab_article.id', '=', 'ab_article_has_articlecategory.ab_article_id')
                ->where('ab_article_has_articlecategory.ab_articlecategory_id', '=', $id)
                ->get();

            return view('articles', [
                'articles' => $a,
            ]);
        }
        if (!$request->input('search')) {
            $allarticles = Article::all();
            return view('articles', ['articles' => $allarticles]);
        }
        $search = strtolower($request->input('search'));
        $articles = Article::query()->whereRaw('LOWER(ab_name) LIKE ?', ['%' . $search . '%'])->get();

        return view('articles', [
            'articles' => $articles,
        ]);
    }

    public function sell(Request $request)
    {
        if (!session()->has('abalo_user'))
        {
            return redirect()->action([AuthController::class,'login']);
        }
        return view('sell');
    }

    public function verifyArticle(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');


        $pattern = '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/';

        if (empty($name) || strlen($name) > 60 || preg_match($pattern,$name) || empty($price) || !is_numeric($price) || $price <= 0 || strlen($description) > 1000 || str_contains($description, '??') || empty($description))
        {
            $errMsg = "Es ist ein Fehler aufgetreten. Bitte korrigieren Sie Ihre Eingaben und verwenden Sie keine Sonderzeichen.";
            session()->put('errMsgArticle',$errMsg);
            $allarticles = Article::all();
            return view('articles', [
                'articles' => $allarticles,
            ]);
        }
        $article = new Article();
        $article->ab_name = $name;
        $article->ab_price = $price;
        $article->ab_description = $description;
        $article->ab_creator_id = session()->get('abalo_id');
        $article->ab_createdate = date('Y-m-d H:i:s');
        $article->save();

        $successMsg = "Ihr Artikel wurde erfolgreich eingestellt!";
        session()->put('successMsg',$successMsg);

        if ($request->file('img')->extension() == 'jpg' || $request->file('img')->extension() == "png" || $request->file('img')->getSize() < 5000)
        {
            $maxID = Article::query()->selectRaw("MAX(id)")->get();
            $currentId = $maxID[0]->max;

            $request->file('img')->storeAs('/useruploads',$currentId . '.' . $request->file('img')->extension());
            $image = NULL;
            if ($request->file('img')->extension() == "png")
            {
                $image = imagecreatefrompng(storage_path(). '/app/useruploads/' . $currentId . '.' . $request->file('img')->extension());
            }
            else if ($request->file('img')->extension() == "jpg")
            {
                $image = imagecreatefromjpeg(storage_path(). '/app/useruploads/' . $currentId . '.' . $request->file('img')->extension());
            }

            $imgResized = imagescale($image,200,200);

            if ($request->file('img')->extension() == "png")
            {
                imagepng($imgResized,public_path(). '/img/' . $currentId . '.' . $request->file('img')->extension());
            }
            else if ($request->file('img')->extension() == "jpg")
            {
                imagejpeg($imgResized,public_path(). '/img/' . $currentId . '.' . $request->file('img')->extension());
            }
        }

        $allarticles = Article::all();
        return view('articles', [
            'articles' => $allarticles,
        ]);
    }
}
