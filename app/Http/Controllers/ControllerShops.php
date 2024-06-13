<?php

namespace App\Http\Controllers;


use App\Models\Shop;
use Illuminate\Http\Request;

class ControllerShops extends Controller
{
    public function list(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);

        $list = Shop::query()
            ->with(['currency'])
            ->forPage($page, $pageSize)
            ->get()
            ->all()
        ;

        return response()->json($list);
    }
}
