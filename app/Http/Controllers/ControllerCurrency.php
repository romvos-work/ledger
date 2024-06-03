<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ControllerCurrency extends Controller
{
    public function list()
    {
        return new JsonResponse([
            ['id' => 1, 'name' => 'dollar'],
            ['id' => 2, 'name' => 'ruble'],
        ]);
    }
}
