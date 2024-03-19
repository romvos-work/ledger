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
            'ohh' => 'yeah!',
        ]);
    }

    public function apiList()
    {
        return new JsonResponse([
            'ohh' => 'wth',
        ]);
    }

    public function item()
    {
        return new JsonResponse([
            'ohh' => 'item',
        ]);
    }

    public function listitem()
    {
        return new JsonResponse([
            'list' => 'item',
            'item' => 'item',
        ]);
    }

}
