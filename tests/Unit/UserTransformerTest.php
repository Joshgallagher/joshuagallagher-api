<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Transformers\UserTransformer;

class UserTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function user_fields_are_transformed_to_an_array_for_a_json_response()
    {
        $user = factory(User::class)->create([
            'first_name' => 'Joshua',
            'last_name' => 'Gallagher',
        ]);

        $userTransformer = new UserTransformer();
        $transformedUser = $userTransformer->transform($user);

        $this->assertEquals('Joshua Gallagher', $transformedUser['name']);
    }
}
