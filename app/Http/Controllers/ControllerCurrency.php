<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ControllerCurrency extends Controller
{
    public function list(Request $request): JsonResponse
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);

        $list = Currency::all()
            ->forPage($page, $limit);

        return response()->json($list);
    }
}
