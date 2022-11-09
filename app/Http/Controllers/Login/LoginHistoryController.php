<?php

declare(strict_types=1);

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\LoginLogOutHistory;
use Illuminate\Support\Carbon;

final class LoginHistoryController extends Controller
{
    private const LOGIN = 'Ingreso a la plataforma';

    /**
     * @param LoginLogOutHistory $loginLogOutHistory
     */
    public function __construct(private LoginLogOutHistory $loginLogOutHistory)
    {
    }

    /**
     * @param int $userId
     * @return void
     */
    public function __invoke(int $userId): void
    {
        $this->loginLogOutHistory->create([
            "type" => self::LOGIN,
            "user_id" => $userId,
            "created_at" => Carbon::now()
        ]);
    }
}
