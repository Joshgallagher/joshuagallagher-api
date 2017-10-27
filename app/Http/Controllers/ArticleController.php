<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Spatie\Fractalistic\Fractal;
use App\Transformers\ArticleTransformer;

class ArticleController extends Controller
{
    /**
     * Returns a collection of articles.
     *
     * @return App\Transformers\ArticleTransformer
     */
    public function index()
    {
        return Fractal::create()
            ->collection(Article::get())
            ->parseIncludes(['user'])
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }

    /**
     * Show a specific topic requested by it's slug.
     *
     * @param  String $slug
     * @return App\Transformers\ArticleTransformer
     */
    public function show(String $slug)
    {
        $article = Article::where('slug', $slug);

        return Fractal::create()
            ->item($article->first())
            ->parseIncludes(['user'])
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }
}
