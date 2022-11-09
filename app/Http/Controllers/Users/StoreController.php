<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

final class StoreController extends Controller
{
    /**
     * @param User $user
     */
    public function __construct(private User $user)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $password = password_hash($request->password, PASSWORD_DEFAULT);
        $request->request->remove('password');

        $data = [
            'status' => true,
            'created_at' => Carbon::now(),
            'password' => $password,
            ...$request->all()
        ];

        $user = $this->user->create($data);

        return response()->json([
            "error" => !$user,
            "data" => $user ? [
                "message" => "usuario registrado correctamente",
                "id" => $user->id
            ] : "Ha ocurrido un erro registrando el usuario"
        ], 201);
    }
}
