<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * A user can have many articles.
     *
     * @return Illuminate\Database\Eloquent\Concerns\hasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Return the columns 'first_name' and 'last_name' as a formatted full name.
     *
     * @return String
     */
    public function getFullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
