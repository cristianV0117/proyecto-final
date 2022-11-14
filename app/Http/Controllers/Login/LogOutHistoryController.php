<?php

declare(strict_types=1);

namespace App\Http\Controllers\Login;

use Illuminate\Support\Facades\DB;

final class LogOutHistoryController
{
    private const LOG_OUT = 'Salida de la plataforma';

    /**
     * @param int $userId
     * @return void
     */
    public function __invoke(
        int $userId
    ): void
    {
        DB::select('CALL save_login_log_out_history(?,?)', [
            $userId,
            self::LOG_OUT
        ]);
    }
}
