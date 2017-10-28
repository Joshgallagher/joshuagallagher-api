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
        $articles = Article::orderBy('created_at', 'desc')
            ->get();

        return Fractal::create()
            ->collection($articles)
            ->parseIncludes(['user'])
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }

    /**
     * Return a specific topic as JSON, requested by it's slug.
     *
     * @param  String $slug
     * @return App\Transformers\ArticleTransformer
     */
    public function show(String $slug)
    {
        $article = Article::where('slug', $slug)
            ->first();

        return Fractal::create()
            ->item($article)
            ->parseIncludes(['user'])
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }
}
