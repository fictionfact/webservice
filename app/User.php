<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

/**
*
*   @SWG\Definition(
*       definition="User",
*       @SWG\Property(
*           property="id",
*           type="integer",
*           format="int32"
*       ),
*       @SWG\Property(
*           property="name",
*           type="string"
*       ),
*       @SWG\Property(
*           property="email",
*           type="string"
*       ),
*       @SWG\Property(
*           property="password",
*           type="string"
*       ),
*       @SWG\Property(
*           property="created_at",
*           type="string"
*       ),
*       @SWG\Property(
*           property="updated_at",
*           type="string"
*       )
*   )
*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
