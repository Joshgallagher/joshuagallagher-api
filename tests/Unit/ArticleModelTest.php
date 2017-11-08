<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;

class ArticleModelTest extends TestCase
{
    /**
     * @test
     */
    public function format_article_dates_as_month_day_comma_year()
    {
        factory(User::class)->create();
        $article = factory(Article::class)->create([
            'created_at' => '1997-07-20 17:16:18',
            'updated_at' => '1997-07-20 17:16:18'
        ]);

        $this->assertEquals($article->created_at, 'July 20, 1997');
        $this->assertEquals($article->updated_at, 'July 20, 1997');
    }

    /**
     * @test
     */
    public function an_article_belongs_to_a_single_user()
    {
        factory(User::class)->create();
        $article = factory(Article::class)->create();

        $this->assertInstanceOf(User::class, $article->user);
    }
}
