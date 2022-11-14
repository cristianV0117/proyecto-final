<?php

declare(strict_types=1);

namespace App\Http\Controllers\Books;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

final class IndexController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return response()->json([
            "error" => false,
            "data" => DB::select('CALL get_all_books')
        ]);
    }
}
