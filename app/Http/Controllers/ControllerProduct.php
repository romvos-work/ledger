<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function list(Request $request)
    {
        throw new \Exception('test');

        return new JsonResponse([
            'fuck' => 'yeah!',
        ]);
    }

    public function apiList()
    {
        return new JsonResponse([
            'fuck' => 'wtf',
        ]);
    }

    public function item()
    {
        return new JsonResponse([
            'fuck' => 'item',
        ]);
    }

}
