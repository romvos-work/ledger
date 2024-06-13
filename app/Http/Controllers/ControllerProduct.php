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
        $filter = $request->input('filter', null);
        $search = $request->input('search', '');

        $query = Product::query();

        if (!empty($filter)) {
            $query->where($filter, 'like', "%{$search}%");
        }

        $queryMeta = clone $query;

        return response()
            ->json([
                'meta' => [
                    'total' => $queryMeta->count(),
                ],
                'items' => $query->forPage($page, $pageSize)
                    ->get()
                    ->all(),
            ]);
    }

    public function item(Request $request, $id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

}
