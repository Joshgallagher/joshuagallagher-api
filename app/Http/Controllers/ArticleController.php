<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Spatie\Fractalistic\Fractal;
use App\Transformers\ArticleTransformer;

class ArticleController extends Controller
{
    /**
     * [index description]
     *
     * @return [type] [description]
     */
    public function index()
    {
        $articles = (new Article)->get();

        return Fractal::create()
            ->collection($articles)
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }
}
