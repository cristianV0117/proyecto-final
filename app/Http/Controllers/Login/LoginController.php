<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\UserToken;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

final class LoginController extends Controller
{
    /**
     * @param User $user
     * @param UserToken $userToken
     * @param LoginHistoryController $loginHistoryController
     */
    public function __construct(
        private User $user,
        private UserToken $userToken,
        private LoginHistoryController $loginHistoryController
    )
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function __invoke(Request $request): JsonResponse
    {
        $user = $this->user->where('email', '=', $request->email)->get();

        if (empty($user->toArray())) {
            throw new Exception("Usuario o contraseña incorrectos", 400);
        }

        if (!password_verify($request->password, $user[0]->password)) {
            throw new Exception("Usuario o contraseña incorrectos", 400);
        }

        $this->loginHistoryController->__invoke($user[0]->id);

        return response()->json([
            "error" => false,
            "data" => [
                "token" => $this->createToken($user[0]->id),
                "id" => $user[0]->id,
                "email" => $user[0]->email
            ]
        ]);
    }

    /**
     * @param int $userId
     * @return string
     */
    private function createToken(int $userId): string
    {
        $token = $this->generateRandomToken();

        $this->userToken->create([
            "token" => $token,
            "created_at" => Carbon::now(),
            "expired_at" => Carbon::now()->addMinutes(5),
            "user_id" => $userId
        ]);

        return $token;
    }

    /**
     * @return string
     */
    private function generateRandomToken(): string
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;

        while ($i <= 50) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return $pass;
    }
}
