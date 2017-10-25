<?php

namespace App\Transformers;

class ArticleTransformer extends Transformer
{
    /**
     * Transform the given article collection into JSON.
     *
     * @param  Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'title' => $article->title,
            'slug' => $article->slug,
            'teaser' => $article->teaser,
            'body' => $article->body,
            'created_at' => $article->created_at,
            'updated_at' => $article->updated_at,
        ];
    }
}
