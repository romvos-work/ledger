<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function list(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);

        $list = Product::all()
            ->forPage($page, $pageSize);

        return response()->json($list);
    }

    public function item(Request $request, $id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

}
