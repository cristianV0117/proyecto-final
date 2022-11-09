<?php

namespace App\Http\Controllers\Login;

use App\Models\UserToken;
use Carbon\Carbon;

final class LogOutController
{
    public function __construct(
        private UserToken $userToken
    )
    {
    }

    public function __invoke(int $userId)
    {
        $token = $this->userToken->where('user_id', "=", $userId)->where('expired_at', '<', Carbon::now())->get();
    }
}
