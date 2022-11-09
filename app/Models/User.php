<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

final class User extends Authenticatable
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'country_id',
        'status',
        'created_at',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
