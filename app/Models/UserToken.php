<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class UserToken extends Model
{
    protected $table = 'user_tokens';

    protected $fillable = [
        'token',
        'created_at',
        'expired_at',
        'user_id'
    ];

    public $timestamps = false;
}
