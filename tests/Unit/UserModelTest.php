<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class UserModelTest extends TestCase
{
    /**
     * @test
     */
    public function a_users_full_name_is_returned_formatted()
    {
        $user = factory(User::class)->make([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $this->assertEquals($user->getFullName(), 'John Doe');
    }

    /**
     * @test
     */
    public function a_user_has_many_articles()
    {
        $user = factory(User::class)->create();
        factory(Article::class, 4)->create();

        $this->assertInstanceOf(Collection::class, $user->articles);
    }
}
