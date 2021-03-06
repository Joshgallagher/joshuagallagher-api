<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;
use GrahamCampbell\Markdown\Facades\Markdown;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * Transformers that are available to be injected into the ArticleTransformer.
     *
     * @var array
     */
    protected $availableIncludes = ['user'];

    /**
     * Transform the given article collection into JSON.
     *
     * @param Article $article
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'title' => $article->title,
            'slug' => $article->slug,
            'teaser' => $article->teaser,
            'body' => Markdown::convertToHtml($article->body),
            'created_at' => $article->created_at,
            'updated_at' => $article->updated_at,
        ];
    }

    /**
     * Returns the user associated to a specific article,
     * for injection into the Article transformer.
     *
     * @param Article $article
     *
     * @return Spatie\Fractalistic\item
     */
    public function includeUser(Article $article)
    {
        return $this->item($article->user, new UserTransformer());
    }
}
