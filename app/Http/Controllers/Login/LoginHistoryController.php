<?php

declare(strict_types=1);

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

final class LoginHistoryController extends Controller
{
    private const LOGIN = 'Ingreso a la plataforma';

    /**
     * @param int $userId
     * @return void
     */
    public function __invoke(int $userId): void
    {
        DB::select('CALL save_login_log_out_history(?,?)', [
            $userId,
            self::LOGIN
        ]);
    }
}
