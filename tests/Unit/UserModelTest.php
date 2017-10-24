<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserModelTest extends TestCase
{
    /**
     * @test
     */
    public function a_users_full_name_is_returned_formatted()
    {
        $user = factory(\App\Models\User::class)->make([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $this->assertEquals($user->getFullName(), 'John Doe');
    }
}
