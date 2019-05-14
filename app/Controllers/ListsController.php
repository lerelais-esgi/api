<?php

namespace App\Controllers;

use OpenFoodFacts\Api;
use OpenFoodFacts\Exception\ProductNotFoundException;
use Slim\Http\Body;
use Slim\Http\Response;
use Slim\Http\Request;

class ListsController extends Controller
{
    public function create(Request $request, Response $response) {

    }

    public function add(Request $request, Response $response) {
        $list = [
            "peoductname" => [
                "limit" => 'date',
                "barecode" => '8000500267035',
                "type"  => "food",
                "quanity" => '8'
            ]
        ];
        echo json_encode($list);
    }
}