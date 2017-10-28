<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;

class ArticleTest extends TestCase
{
    /**
     * @test
     */
    public function a_collection_of_articles_are_returned_as_json()
    {
        factory(User::class)->create();
        $articles = factory(Article::class, 10)->create();

        $this->json('GET', '/articles')
            ->seeJsonStructure([
                'data' => [[
                    'title',
                    'slug',
                    'teaser',
                    'body',
                    'created_at',
                    'updated_at',
                    'user' => [
                        'data' => [
                            'name'
                        ]
                    ]
                ]],
                'meta' => [
                    'pagination' => [
                        'total',
                        'count',
                        'per_page',
                        'current_page',
                        'total_pages',
                        'links' => [
                            'next',
                        ]
                    ]
                ]
            ])
            ->assertResponseStatus(200);
    }

    /**
     * @test
     */
    public function a_single_article_is_returned_as_json()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create();

        $this->json('GET', "/articles/{$article->slug}")
            ->seeJson([
                'data' => [
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'teaser' => $article->teaser,
                    'body' => $article->body,
                    'created_at' => $article->created_at,
                    'updated_at' => $article->updated_at,
                    'user' => [
                        'data' => [
                            'name' => $user->getFullName(),
                        ]
                    ]
                ],
            ])
            ->assertResponseStatus(200);
    }
}
