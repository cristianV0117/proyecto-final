<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

final class IndexController extends Controller
{
    /**
     * @param User $user
     */
    public function __construct(private User $user)
    {
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return response()->json([
                "error" => false,
                "data" => $this->user->all() ?? "No hay usuarios"
        ], 200);
    }
}
