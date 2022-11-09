<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLogOutHistory extends Model
{
    protected $table = 'login_log_out_histories';

    protected $fillable = [
        'type',
        'user_id',
        'created_at'
    ];

    public $timestamps = false;
}
