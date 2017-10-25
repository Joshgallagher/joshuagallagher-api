<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Spatie\Fractalistic\Fractal;
use App\Transformers\ArticleTransformer;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = new Article;

        Fractal::create()
            ->collection($articles->get())
            ->transformWith(new ArticleTransformer())
            ->toArray();
    }
}
