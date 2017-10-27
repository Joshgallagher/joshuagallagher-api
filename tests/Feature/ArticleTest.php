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
        $articles = factory(Article::class, 4)->create();

        $this->json('GET', '/articles')
            ->seeJsonStructure([
                'data' => [[
                    'title',
                    'slug',
                    'teaser',
                    'body',
                    'created_at',
                    'updated_at'
                ]]
            ])
            ->assertResponseStatus(200);
    }
}
