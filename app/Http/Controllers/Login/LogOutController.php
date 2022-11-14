<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\UserToken;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;

final class LogOutController extends Controller
{
    public function __construct(
        private UserToken $userToken,
        private LogOutHistoryController $logOutHistoryController
    )
    {
    }

    /**
     * @param int $userId
     * @return JsonResponse
     * @throws Exception
     */
    public function __invoke(int $userId): JsonResponse
    {
        $token = $this->userToken->where('user_id', "=", $userId)->where('expired_at', '>', Carbon::now())->delete();

        if (!$token) {
            throw new Exception("No se pudo eliminar el token", 500);
        }

        $this->logOutHistoryController->__invoke($userId);

        return response()->json([
            "error" => false,
            "data" => [
                "message" => "Adios"
            ]
        ]);
    }
}
