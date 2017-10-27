<?php

namespace App\Transfomers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransfromer extends TransformerAbstract
{
    /**
     * Transform the given user collection into JSON.
     *
     * @param  User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'name' => $user->getFullName(),
        ];
    }
}
