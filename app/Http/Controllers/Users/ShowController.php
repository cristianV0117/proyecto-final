<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

final class ShowController extends Controller
{
    /**
     * @param User $user
     */
    public function __construct(private User $user)
    {
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $user = $this->user->find($id);
        return response()->json([
            "error" => !$user,
            "data" => $user ? $user->toArray() : "No hay usuarios"
        ], 200);
    }
}
