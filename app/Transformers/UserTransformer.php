<?php

namespace App\Transfomers;

use App\Models\User;

class UserTransfromer extends Transfomer
{
    /**
     * Transform the given user model instance into JSON.
     *
     * @return App\Models\User $user
     */
    public function transform(User $user)
    {
        return [
            'name' => $user->getFullName(),
        ];
    }
}
