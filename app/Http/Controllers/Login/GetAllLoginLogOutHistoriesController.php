<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class GetAllLoginLogOutHistoriesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return response()->json([
            "error" => false,
            "data" => DB::select('CALL get_all_login_log_out_histories')
        ]);
    }
}
