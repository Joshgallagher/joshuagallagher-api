<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use App\Transformers\ArticleTransformer;

class ArticleTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function article_fields_are_transformed_to_an_array_for_a_json_response()
    {
        factory(User::class)->make();
        $article = factory(Article::class)->make([
            'title' => 'Lumen',
            'slug' => 'lumen',
        ]);

        $articleTransformer = new ArticleTransformer();
        $transformedArticle = $articleTransformer->transform($article);

        $this->assertEquals('Lumen', $transformedArticle['title']);
        $this->assertEquals('lumen', $transformedArticle['slug']);
    }
}
